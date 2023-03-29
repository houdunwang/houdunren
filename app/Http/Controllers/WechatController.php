<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Services\WechatService;
use Cache;
use Houdunwang\Wechat\Message;
use Log;
use Modules\Edu\Entities\Morning;

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
        if ($content = $this->process()) return $content;

        return $this->defaultMessage('没明白你的意思');
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

    //模块微信被动消息服务
    protected function process()
    {
        $modules = Module::whereNotNull('process')->get();
        foreach ($modules as $module) {
            $class = 'Modules\\' . $module->name . '\Core\Process';
            if (!class_exists($class)) continue;

            $instance = new $class;
            return $instance->handle($this->msg);
        }
    }

    //默认消息
    protected function defaultMessage()
    {
        $morning = Morning::where('state', 0)->first();
        if ($morning) {
            return $this->msg->news([
                [
                    'title' => '本期【早起少年】活动礼品，等你拿',
                    'description' => '早睡早起，拥有好心情和好身体。家人开心，自己健康。',
                    'picurl' => $morning->image,
                    'url' => url('morning')
                ]
            ]);
        }
        return $this->msg->text('没明白你的意思，晚上八点来直播间聊天吧');
    }
}
