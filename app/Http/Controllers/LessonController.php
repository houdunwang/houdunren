<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Video;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Resources\LessonResource;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        return LessonResource::collection(Lesson::latest('id')->with('system')->paginate($request->query('row', 12)));
    }

    public function store(StoreLessonRequest $request, Lesson $lesson)
    {
        $this->authorize('create', Lesson::class);
        $lesson->fill($request->input())->save();

        $videos = collect($request->videos)->filter(fn ($v) => $v['title'] && $v['path']);
        $lesson->videos()->createMany($videos->toArray());

        //统计
        $lesson->video_num = Video::where('lesson_id', $lesson->id)->count();
        $lesson->save();
        if ($lesson->system) {
            $lesson->system->lesson_num = Lesson::where('system_id', $lesson->system_id)->count();
            $lesson->system->video_num = Video::whereIn('lesson_id', $lesson->system->lessons->pluck('id'))->count();
            $lesson->system->save();
        }

        return $this->respondOk('课程添加成功');
    }

    //获取下载地址
    public function downloadUrl(Lesson $lesson)
    {
        if (isSubscribe()) {
            return $lesson->download_address ?? $lesson->system->download_address;
        }
        // return '';
    }

    public function show(Lesson $lesson)
    {
        return new LessonResource($lesson->load(['videos' => function ($query) {
            $query->orderBy('order')->orderBy('id');
        }, 'system']));
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $this->authorize('update', $lesson);
        //课程视频
        $videos = collect($request->videos)->filter(fn ($v) => !empty($v['title']) && !empty($v['path']));
        $videoIds = collect([]);
        $videos->map(function ($video) use ($lesson, $videoIds) {
            $v =    Video::updateOrCreate(['id' => $video['id'] ?? 0], ['lesson_id' => $lesson['id']] + $video);
            $videoIds->push($v->id);
        });
        $lesson->videos()->whereNotIN('id', $videoIds)->delete();

        //课程
        $lesson->fill($request->input());
        $lesson->video_num = Video::where('lesson_id', $lesson->id)->count();
        $lesson->save();
        if ($lesson->system) {
            $lesson->system->lesson_num = Lesson::where('system_id', $lesson->system_id)->count();
            $lesson->system->video_num = Video::whereIn('lesson_id', $lesson->system->lessons->pluck('id'))->count();
            $lesson->system->save();
        }

        return $this->respondOk('课程更新成功');
    }

    public function destroy(Lesson $lesson)
    {
        $this->authorize('delete', $lesson);
        $lesson->delete();
        return $this->respondOk('删除成功');
    }
}
