<?php

namespace App\Http\Controllers;

use App\Services\WechatService;
use Cache;
use Houdunwang\Wechat\Message;
use Log;

//与微信服务器通信接口
class WechatController extends Controller
{
    protected $msg;

    public function __construct()
    {
        $this->msg = app(Message::class)->config(config('hd.wechat'));
    }

    public function handle()
    {
        if ($reply = $this->subscribe()) return $reply;
        if ($reply = $this->scanLogin()) return $reply;

        return $this->msg->text('没明白你的意思');
    }

    //订阅
    protected function subscribe()
    {
        if ($this->msg->isSubscribe()) {
            app(WechatService::class)->registerByOpenid($this->msg->FromUserName);
            return $this->msg->text(config('app.name') . '后盾人 欢迎你回家');
        }
    }

    //扫码登录
    protected function scanLogin()
    {
        if ($this->msg->isScan() && $this->msg->EventKey == 'bind') {
            Cache::put($this->msg->Ticket, $this->msg->message, now()->addMinutes(10));
            return $this->msg->text(config('app.name') . ' 欢迎你回家');
        }
    }
}
