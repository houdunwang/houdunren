<?php

namespace Modules\Edu\Api;

use Modules\Edu\Http\Requests\LessonRequest;
use Modules\Edu\Transformers\LessonResource;
use App\Http\Controllers\Controller;
use Modules\Edu\Entities\Lesson;
use Modules\Edu\Entities\Video;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Site;
use ActivityService;
use Auth;
use DB;

/**
 * 课程管理
 * @package Modules\Edu\Http\Controllers
 */
class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
        $this->authorizeResource(Lesson::class, 'lesson');
    }

    /**
     * 课程列表
     * @return void
     */
    public function index(Site $site)
    {
        $lessons = Lesson::where('site_id', $site->id)->with('user')->latest()->paginate(12);
        return LessonResource::collection($lessons);
    }

    /**
     * 获取课程
     * @param Lesson $lesson
     * @return void
     */
    public function show(Site $site, Lesson $lesson)
    {
        return new LessonResource($lesson->load(['videos', 'tags']));
    }

    /**
     * 保存课程
     *
     * @param LessonRequest $request
     * @param Lesson $lesson
     * @return void
     */
    public function store(LessonRequest $request, Site $site, Lesson $lesson)
    {
        DB::beginTransaction();
        $lesson->fill($request->except(['file', 'tags', 'videos']) + [
            'user_id' => Auth::id(),
            'site_id' => site()->id
        ])->save();

        $lesson->tags()->sync($request->tags);
        $this->updateVideos($lesson, $request);
        DB::commit();
        ActivityService::log($lesson);
        return ['message' => '课程添加成功'];
    }

    /**
     * 更新课程
     * @param LessonRequest $request
     * @param Lesson $lesson
     * @return void
     */
    public function update(LessonRequest $request, Site $site, Lesson $lesson)
    {
        DB::beginTransaction();
        $lesson->fill($request->except(['file', 'tags', 'videos']))->save();
        $lesson->tags()->sync($request->tags);
        $this->updateVideos($lesson, $request);
        DB::commit();
        return ['message' => '课程修改成功'];
    }

    /**
     * 更新视频
     *
     * @param Lesson $lesson
     * @param Request $request
     * @return void
     */
    protected function updateVideos(Lesson $lesson, Request $request)
    {
        DB::beginTransaction();
        $lesson->videos()->whereNotIn('id', collect($request->videos)->pluck('id'))->delete();
        foreach ((array)$request->videos as $rank => $video) {
            if ($video['title']) {
                Video::updateOrCreate(['id' => $video['id'] ?? 0], [
                    'site_id' => site()['id'],
                    'lesson_id' => $lesson['id'],
                    'rank' => $rank,
                    'title' => $video['title'],
                    'path' => $video['path'],
                    'external_address' => $video['external_address'],
                ]);
            }
        }
        DB::commit();
    }

    /**
     * 删除视频
     *
     * @param Lesson $lesson
     * @return void
     */
    public function destroy(Site $site, Lesson $lesson)
    {
        DB::beginTransaction();
        $lesson->delete();
        return back()->with('success', '视频删除成功');
        DB::commit();
    }

    /**
     * 搜索课程
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $lessons = Lesson::when($request->keyword, function ($query, $keyword) {
            return $query->where('title', 'like', "%{$keyword}%");
        })->limit(10)->get();
        return $lessons;
    }
}
