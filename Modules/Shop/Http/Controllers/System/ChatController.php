<?php
namespace Modules\Shop\Http\Controllers\System;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Site;
use App\Models\Chat;
use App\Models\Keyword;
use Houdunwang\WeChat\Build\Message\Message;

class ChatController extends Controller
{
    /**
     * 微信消息处理
     * @param Site $site 站点
     * @param Chat $chat 微信公众号
     * @param Message $message 消息处理器
     * @param Keyword $keyword 关键词
     * @return string
     */
    public function processor(Site $site, Chat $chat, Message $message,Keyword $keyword=null)
    {
        return $message->text('这是模块触发的回复');
    }
    /**
     * 微信订阅消息处理
     * 订阅的消息信息是只读的, 只能用作分析统计
     * @param Site $site 站点
     * @param Chat $chat 微信公众号
     * @param Message $message 消息处理器
     * @param Keyword $keyword 关键词
     * @return null
     */
    public function subscribe(Site $site, Chat $chat, Message $message,Keyword $keyword=null)
    {

    }
}
