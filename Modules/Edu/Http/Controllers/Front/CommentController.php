<?php

namespace Modules\Edu\Http\Controllers\Front;

use Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Comment;
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
        $comments = $this->model($model, $id)->comments()->with('user:id,name,avatar')->get();
        return new CommentCollection($comments);
    }

    public function store(Request $request, $model, $id)
    {
        $key = user('id') . 'comment_timeout';
        if (Cache::has($key)) {
             abort(403, '评论发送间隔为20秒');
        }

        $model  = $this->model($model, $id);
        $comment = $model->comments()->create([
            'content' => $request->input('content'),
            'user_id' => user('id'),
            'site_id' => site()['id'],
        ]);

        Cache::put($key, '', now()->addSecond(20));

        $model->user->notify(new CommentNotification($comment));

        return response()->json(['message' => '评论发表成功', 'data' => new CommentResource($comment)]);
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
