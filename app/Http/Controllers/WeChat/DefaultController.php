<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\WeChat;
use Illuminate\Http\Request;

/**
 * 微信默认消息
 */
class DefaultController extends Controller
{
    /**
     * 编辑消息
     *
     * @param WeChat $wechat
     * @return void
     */
    public function edit(WeChat $wechat)
    {
        return inertia('Wechat/Default/Form', ['site' => $wechat->site, 'wechat' => $wechat]);
    }

    /**
     * 更新消息
     */
    public function update(Request $request, WeChat $wechat)
    {
        $request->validate(['welcome' => ['required'], 'default_message' => ['required']], [
            'welcome.required' => '关注欢迎消息不能为空',
            'default_message.required' => '默认回复消息不能为空'
        ]);

        $wechat->fill($request->all())->save();
        return back()->with('success', '默认回复设置成功');
    }
}
