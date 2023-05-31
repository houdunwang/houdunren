<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Auth;
use Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index']);
    }

    public function index()
    {
        $model = modelInstance();
        return CommentResource::collection($model->comments()->whereNull('comment_id')->latest('updated_at')->get());
    }

    public function store(StoreCommentRequest $request)
    {
        $this->authorize('create', Comment::class);

        return rateLimiter('comment-store' . Auth::id(), 3, function () use ($request) {
            $model = modelInstance();
            $comment = $model->comments()->create($request->input() + ['user_id' => Auth::id()]);
            return new CommentResource($comment->fresh());
        });
    }

    public function show(Comment $comment)
    {
        $count = $comment->latest('id')->where('id', '<=', $comment->id)->count();

        return [
            'page' => ceil($count / 20),
            'comment' => $comment
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return $this->respondOk('评价删除成功');
    }
}
