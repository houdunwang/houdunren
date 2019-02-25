<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WeChat;
use Houdunwang\WeChat\Build\Message\Message;

class WeChatController extends Controller
{
    public function processor(WeChat $weChat, Message $message)
    {
        //绑定微信
        $message->config($weChat)->valid();
        //站点公众号连接测试
        if ($message->Content == 'hdcms') {
            return $message->text('恭喜~ 微信公众号配置成功');
        }
    }
}
