<?php

namespace App\Http\Controllers\Common;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        //获取模型
        $model = hd_model($request->input('model'), $request->input('id'));
        //获取模型并包含用户与赞数据
        $comments = $model->comment()->with('user')->withCount('zan')->get();
        return ['comments' => $comments, 'code' => 0];
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $model = hd_model($request->input('model'), $request->input('id'));
        $data = $request->only('content');
        $data['user_id'] = auth()->id();
        $comment = $model->comment()->create($data);

        return ['comment' => $comment->with('user', 'zan')->find($comment['id']), 'code' => 0];
    }

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
