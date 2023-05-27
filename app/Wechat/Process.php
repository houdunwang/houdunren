<?php

namespace Modules\Edu\Core;

use App\Services\WechatService;
use Houdunwang\Wechat\Message;

class Process
{
    public function handle(Message $message)
    {
        if (!preg_match('/^\s*签到/', $message->Content)) return;

        $user = app(WechatService::class)->registerByOpenid($message->FromUserName);
        //签到判断
        $isSign = $user->model('Edu')->signs()->whereDate('created_at', now())->exists();
        if ($isSign) return $message->text('今天你已经签到过');
        $content = preg_replace(['/\s+/s', '/^\s*签到\s*/is'], '', $message->Content);
        if (mb_strlen($content < 5)) return $message->text('签到内容不能小于5个字');
        //创建签到
        $user->model('Edu')->signs()->create(['content' => $content . '【微信快签】', 'mood' => 'kx']);
        return $message->news([
            [
                'title' => '签到成功',
                'description' => '大叔祝你天天好心情',
                'picurl' => url('/assets/xj.jpg'),
                'url' => url('/sign')
            ]
        ]);
    }
}
