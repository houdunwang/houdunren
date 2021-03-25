<?php

namespace App\WeChat;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeChatSendAllResource;
use App\Models\WeChatSendAll;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\WeChat;

/**
 * 微信群发消息
 * @package App\WeChat
 */
class WeChatSendAllController extends Controller
{
    public function index(Site $site, WeChat $wechat)
    {
        $messages = $wechat->sendAllMessages()->latest('id')->paginate(10);
        return WeChatSendAllResource::collection($messages);
    }

    public function store(Request $request, Site $site, WeChat $wechat,  WeChatSendAll $message)
    {
        $wechat->sendAllMessages()->create($request->input());
        return $this->message('群发消息保存成功');
    }

    public function show(WeChatSendAll $weChatSendAll)
    {
    }

    public function update(Request $request, Site $site, WeChat $wechat,  WeChatSendAll $message)
    {
        $message->fill($request->input())->save();
        return $this->message('群发消息保存成功');
    }

    public function destroy(Request $request, Site $site, WeChat $wechat,  WeChatSendAll $message)
    {
        $message->delete();
        return $this->message('群发消息删除成功');
    }
}
