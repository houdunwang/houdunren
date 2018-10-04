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

    public function store(Request $request)
    {
        $model = hd_model();
        $data = $request->only(['content', 'url']);
        $data['user_id'] = auth()->id();
        $comment = $model->comment()->create($data);

        return ['comment' => $comment->with('user', 'zan')->find($comment['id']), 'code' => 0];
    }
}
