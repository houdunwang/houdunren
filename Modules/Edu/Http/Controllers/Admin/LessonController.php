<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Lesson;
use Modules\Edu\Entities\Tag;
use Modules\Edu\Entities\Video;
use Modules\Edu\Http\Requests\LessonRequest;
use Auth;
use Illuminate\Support\Facades\DB;
use Modules\Edu\Transformers\LessonResource;

/**
 * 课程管理
 * @package Modules\Edu\Http\Controllers\Admin
 */
class LessonController extends Controller
{
    /**
     * 课程列表
     *
     * @return void
     */
    public function index()
    {
        $lessons = Lesson::latest()->paginate(10);
        return inertia('Admin/Lesson/Index', compact('lessons'));
    }

    /**
     * 添加课程
     *
     * @return void
     */
    public function create()
    {
        $tags = Tag::where('site_id', site()->id)->get();
        return inertia('Admin/Lesson/Form', compact('tags'));
    }

    /**
     * 保存课程
     *
     * @param LessonRequest $request
     * @param Lesson $lesson
     * @return void
     */
    public function store(LessonRequest $request, Lesson $lesson)
    {

        DB::beginTransaction();
        $lesson->fill($request->except(['file', 'tags', 'videos']) + [
            'user_id' => Auth::id(),
            'site_id' => site()->id
        ])->save();
        $lesson->tags()->sync($request->tags);
        $this->updateVideos($lesson, $request);
        DB::commit();

        return redirect()->route('Edu.admin.lesson.index')->with('success', '课程添加成功');
    }

    /**
     * 编辑视图
     *
     * @param Lesson $lesson
     * @return void
     */
    public function edit(Lesson $lesson)
    {
        $tags = Tag::all();
        $lesson = new LessonResource($lesson);
        return inertia('Admin/Lesson/Form', compact('tags', 'lesson'));
    }

    /**
     * 更新课程
     *
     * @param LessonRequest $request
     * @param Lesson $lesson
     * @return void
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {
        DB::beginTransaction();
        $lesson->fill($request->except(['file', 'tags', 'videos']))->save();
        $lesson->tags()->sync($request->tags);
        $this->updateVideos($lesson, $request);
        DB::commit();
        return redirect()->route('Edu.admin.lesson.index')->with('success', '课程修改成功');
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
        $lesson->videos()->whereNotIn('id', collect($request->videos)->pluck('id'))->delete();

        foreach ($request->videos as $rank => $video) {
            Video::updateOrCreate(['id' => $video['id'] ?? 0], [
                'site_id' => site()['id'],
                'lesson_id' => $lesson['id'],
                'rank' => $rank
            ] + $video);
        }
    }

    /**
     * 删除视频
     *
     * @param Lesson $lesson
     * @return void
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return back()->with('success', '视频删除成功');
    }

    /**
     * 搜索课程
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        if ($title = $request->title) {
            $lessons = Lesson::where('title', 'like', "%{$title}%")->paginate();
        } else {
            $lessons = Lesson::paginate();
        }
        return $lessons;
    }
}
