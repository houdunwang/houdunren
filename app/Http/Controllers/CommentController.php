<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Topic;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('type')) {
            $model = modelInstance();
            return CommentResource::collection($model->comments()->whereNull('comment_id')->latest('updated_at')->get());
        }
        return CommentResource::collection(Comment::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        return rateLimiter('comment-store' . Auth::id(), 3, function () use ($request) {
            $model = modelInstance();
            $comment = $model->comments()->create($request->input() + ['user_id' => Auth::id()]);
            return new CommentResource($comment->fresh());
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
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
