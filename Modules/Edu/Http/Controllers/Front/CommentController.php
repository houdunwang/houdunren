<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Models\User;
use Auth;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Comment;
use Modules\Edu\Http\Requests\CommentRequest;
use Modules\Edu\Notifications\CommentNotification;
use Modules\Edu\Transformers\CommentCollection;
use Modules\Edu\Transformers\CommentResource;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index($model, $id)
    {
        $comments = $this->model($model, $id)
            ->comments()
            ->oldest('id')
            ->with('user')
            ->get();
        return new CommentCollection($comments);
    }

    public function store(CommentRequest $request, $model, $id)
    {
        $key = user('id') . 'comment_timeout';
        if (Cache::has($key)) {
            abort(403, '评论发送间隔为10秒');
        }

        $model = $this->model($model, $id);

        $comment = $model->comments()->create(
            $request->input() + [
                'user_id' => user('id'),
                'site_id' => site()['id'],
            ]
        );

        Cache::put($key, '', now()->addSecond(10));

        $this->notify($comment, $model);

        return response()->json(['message' => '评论发表成功', 'data' => new CommentResource($comment)]);
    }

    protected function notify(Comment $comment, $model)
    {
        if ($comment->reply_user_id) {
            User::find($comment->reply_user_id)->notify(new CommentNotification($comment, "{$comment->user->nickname} 回复了你的评论"));
        }

        if ($comment->user->id !== $model->user->id && ($comment->reply_user_id != $model->user->id)) {
            $model->user->notify(new CommentNotification($comment, "{$comment->user->nickname} 评论了你的内容"));
        }
    }

    public function destroy(Request $request, Comment $comment)
    {
        $comment->delete();
        return response()->json(['message' => '评论删除成功']);
    }

    protected function model($model, $id)
    {
        $class = 'Modules\Edu\Entities\\' . $model;
        return app($class)->find($id);
    }
}
