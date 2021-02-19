<?php

namespace Modules\Edu\Api;

use ActivityService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Edu\Entities\Comment;
use Modules\Edu\Entities\Topic;
use Modules\Edu\Http\Requests\CommentRequest;
use Modules\Edu\Notifications\CommentNotification;
use Modules\Edu\Transformers\CommentResource;
use Modules\Edu\Transformers\TopicResource;
use Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\InvalidCastException;
use LogicException;
use Modules\Edu\Entities\Video;
use DB;

/**
 * 评论
 * @package Modules\Edu\Api
 */
class CommentController extends Controller
{
    /**
     * 评论列表
     * @param Topic $topic
     * @return AnonymousResourceCollection
     */
    public function topic(Topic $topic)
    {
        $comments = $topic->comments()->with(['replys.user', 'user', 'commentable'])->whereNull('reply_id')->latest('id')->paginate(15);
        return CommentResource::collection($comments);
    }

    /**
     * 发表评论
     * @param Request $request
     * @param Topic $topic
     * @return void
     * @throws BindingResolutionException
     */
    public function topicSend(CommentRequest $request, Topic $topic)
    {
        $comment = $topic->comments()->create($request->input() + [
            'site_id' => SID,
            'user_id' => Auth::id()
        ]);
        if ($comment->user->id != Auth::id()) {
            Auth::user()->notify(new CommentNotification($comment));
        }
        ActivityService::log($comment);
        return $this->message('评论发表成功', new CommentResource($comment->load(['user'])));
    }

    /**
     * 评论列表
     * @param Video $video
     * @return AnonymousResourceCollection
     */
    public function video(Video $video)
    {
        $comments = $video->comments()->with(['replys'])->whereNull('reply_id')->latest()->paginate();
        return CommentResource::collection($comments);
    }

    /**
     * 发表评论
     * @param Request $request
     * @param Video $video
     * @return void
     * @throws BindingResolutionException
     */
    public function videoSend(CommentRequest $request, Video $video)
    {
        $comment = $video->comments()->create($request->input() + [
            'site_id' => SID,
            'user_id' => Auth::id()
        ]);
        if ($comment->user->id != Auth::id()) {
            Auth::user()->notify(new CommentNotification($comment));
        }
        ActivityService::log($comment);
        return $this->message('评论发表成功', new CommentResource($comment));
    }

    /**
     * 删除评论
     * @param Comment $comment
     * @return void
     * @throws AuthorizationException
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function destroy(Comment $comment)
    {
        DB::beginTransaction();
        $this->authorize('delete', $comment);
        $comment->delete();
        DB::commit();
        return $this->message('评论删除成功');
    }

    /**
     * 评论所在页码
     * @param Comment $comment
     * @return float|false
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function page($id, $cid)
    {
        $total = Comment::where('comment_id', $id)->where('id', '>=', $cid)->whereNull('reply_id')->latest('id')->count();
        return ceil($total / 15);
    }
}
