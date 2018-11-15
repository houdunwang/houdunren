<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Common;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//评论管理
class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store', 'destroy']]);
    }

    public function index()
    {
        //获取模型
        $model = model_instance();
        //获取模型并包含用户与赞数据
        $comments = $model->comment()->with('user')->withCount('zan')->get();
        return ['comments' => $comments, 'code' => 0];
    }

    public function store(Request $request)
    {
        $model = model_instance();
        $data = $request->only(['content', 'url']);
        $data['user_id'] = auth()->id();
        $comment = $model->comment()->create($data);

        return ['comment' => $comment->with('user', 'zan')->find($comment['id']), 'code' => 0];
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with('success', '删除成功');
    }
}
