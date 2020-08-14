<?php

namespace Modules\Edu\Http\Controllers\Front;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use GatewayClient\Gateway;

class ChatController extends Controller
{
    public function __construct()
    {
        //SOCKET地址
        Gateway::$registerAddress = '127.0.0.1:1238';
    }

    //初次连接时显示欢迎信息
    public function init(Request $request)
    {
        Gateway::joinGroup($request->client_id, 'chat');
        if (Auth::check()) {
            $this->sendToAll('进入直播间');
        }
    }

    //发送聊天信息
    public function send(Request $request)
    {
        if (Auth::check()) {
            $this->sendToAll($request->input('content'));
        }
    }

    //通知所有在线用户
    protected function sendToAll($content)
    {
        Gateway::sendToAll(json_encode([
            'user' => ['id' => user('id'), 'nickname' => user('nickname')],
            'content' => $content,
            'user_count' => Gateway::getClientIdCountByGroup('chat')
        ]));
    }
}
