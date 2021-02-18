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
        $comments = $topic->comments()->with(['replys'])->whereNull('reply_id')->latest()->paginate(10);
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
        Auth::user()->notify(new CommentNotification($comment));
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
        $this->authorize('delete', $comment);
        $comment->delete();
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
        $total = Comment::where('comment_id', $id)->latest()->where('id', '>=', $cid)->count();
        return ceil($total / 10);
    }
}
