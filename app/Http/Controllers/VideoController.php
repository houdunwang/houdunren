<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\AliyunService;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Video;
use App\Models\VideoPlayHistory;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Resources\VideoResource;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index',  'history', 'search']);
    }

    public function index()
    {
        return VideoResource::collection(Video::latest('id')->with('lesson')->paginate(15));
    }

    //课程视频
    public function getLessonVideo(Lesson $lesson)
    {
        $this->authorize('getLessonVideo', Video::class);
        return VideoResource::collection($lesson->videos->makeVisible(['path']));
    }

    public function store(StoreVideoRequest $request, Video $video)
    {
        $video->fill($request->input())->save();
        return new VideoResource($video);
    }

    public function show(Video $video)
    {
        try {
            VideoPlayHistory::updateOrCreate(['user_id' => Auth::id(), 'video_id' => $video->id], ['lesson_id' => $video->lesson_id])->touch();
            //视频观看统计
            $video->view_num = VideoPlayHistory::where('video_id', $video->id)->count();
            $video->save();
            //课程观看统计
            $video->lesson->view_num = VideoPlayHistory::where('lesson_id', $video->lesson->id)->count();
            $video->lesson->save();
            //系统课程观看统计
            $system = $video->lesson->system;
            if ($system) {
                $system->view_num = VideoPlayHistory::whereIn('lesson_id', $system->lessons->pluck('id'))->count();
                $system->save();
            }
            //权限判断
            $video = $video->load(['lesson.videos', 'lesson.system.lessons']);
            if (isSubscribe()) {
                $video->makeVisible(['path']);
                $video['path_cdn'] = app(AliyunService::class)->videoCdnUrl($video->path);
            }
            return new VideoResource($video);
        } catch (AuthorizationException $e) {
            return $this->error('没有观看权限');
        }
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        $video->fill($request->input())->save();
        return new VideoResource($video);
    }

    public function search(Request $request)
    {
        return VideoResource::collection(
            Video::byKeyword($request->content)->with('lesson')->latest('videos.id')->paginate($request->query('row', 15))
        );
    }
}
