<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Modules\Edu\Entities\Video;
use Modules\Edu\Http\Requests\CommentRequest;
use Modules\Edu\Services\CommentService;
use Modules\Edu\Services\VideoService;
use Modules\Edu\Transformers\Front\CommentResource;
use Modules\Edu\Transformers\Front\VideoResource;

/**
 * 前台视频
 * @package Modules\Edu\Http\Controllers\Front
 */
class VideoController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index');
    }
    public function index()
    {
        $videos = Video::latest('id')->paginate(15);
        return VideoResource::collection($videos);
    }
    public function check()
    {
    }

    /**
     * 视频数据
     * @param Video $video
     * @return JsonResponse
     */
    public function show(Video $video, VideoService $videoService)
    {
        $canPlay = $videoService->playCheck($video, Auth::user());
        if ($canPlay === false) {
            return $this->error('你没有订阅会员或未购买课程');
        }
        return $this->json(new VideoResource($video));
    }

    /**
     * 点赞
     * @param Video $video
     * @return JsonResponse
     */
    public function favour(Video $video)
    {
        $video->favour()->toggle(Auth::id());
        $video['favour_count'] =  $video->favour()->count();
        $video->save();
        return $this->json(new VideoResource($video));
    }

    /**
     * 收藏
     * @param Video $video
     * @return JsonResponse
     */
    public function favorite(Video $video)
    {
        $video->favorite()->toggle(Auth::id());
        $video->favorite_count = $video->favorite()->count();
        $video->save();
        return $this->json(new VideoResource($video));
    }

    /**
     * 发表评论
     * @param Request $request
     * @param Video $video
     * @return JsonResponse
     */
    public function comment(CommentRequest $request, Video $video, CommentService $commentService)
    {
        if ($commentService->checkTime() === false) {
            return $this->error('请等待20秒后操作');
        }
        $video->comment()->create([
            'site_id' => SITEID,
            'user_id' => Auth::id(),
            'reply_user_id' => $request->reply_user_id ?: null,
            'content' => $request->content,
        ]);
        $video->comment_count = $video->comment()->count();
        $video->save();
        $commentService->record();
        return $video->comment()->latest('id')->with(['user', 'reply'])->first();
    }

    /**
     * 获取评论列表
     * @param Video $video
     * @return JsonResponse
     */
    public function commentList(Video $video)
    {
        $comments = $video->comment()->with(['user', 'reply'])->get();
        return $this->json(CommentResource::collection($comments));
    }
}
