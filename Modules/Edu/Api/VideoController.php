<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Edu\Entities\Video;
use Modules\Edu\Services\VideoService;
use App\Models\Site;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Modules\Edu\Transformers\VideoResource;
use Modules\Edu\Transformers\CommentResource;
use Modules\Edu\Http\Requests\CommentRequest;
use Auth;
use ActivityService;

/**
 * 视频播放
 * @package Modules\Edu\Http\Controllers\Front
 */
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index']);
    }

    /**
     * 最新课程
     * @return mixed
     */
    public function index()
    {
        $videos = Video::latest('id')->paginate(15);
        return $videos;
    }

    /**
     * 获取视频
     * @param Site $site
     * @param Video $video
     * @param VideoService $videoService
     * @return RedirectResponse|Video
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function show(Video $video, VideoService $videoService)
    {
        return new VideoResource($video->load('lesson'));
    }

    /**
     * 评论列表
     * @param Video $video
     * @return AnonymousResourceCollection
     */
    public function commentList(Video $video)
    {
        $comments = $video->comments()->with(['user', 'replyUser'])->latest()->paginate(10);
        return CommentResource::collection($comments);
    }

    /**
     * 发表评论
     * @param Request $request
     * @param Video $video
     * @return void
     * @throws BindingResolutionException
     */
    public function comment(CommentRequest $request, Video $video)
    {
        $comment = $video->comments()->create($request->input() + [
            'site_id' => SID,
            'user_id' => Auth::id()
        ]);
        ActivityService::log($comment);
        return $this->message('评论发表成功', new CommentResource($comment->load(['user', 'replyUser'])));
    }
}
