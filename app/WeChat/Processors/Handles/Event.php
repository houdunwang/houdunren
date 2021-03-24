<?php

namespace App\WeChat\Processors\Handles;

use App\WeChat\Processors\Processor;
use Houdunwang\WeChat\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use LogicException;
use WeChatService;
use Log;

/**
 * 事件消息
 * @package App\WeChat\Message
 */
class Event extends Processor
{
    //事件处理集
    protected $processes = ['isSubscribeEvent'];

    public function handle()
    {
        foreach ($this->processes as $action) {
            if ($content = $this->$action()) {
                return $content;
            }
        }
    }

    /**
     * 关注事件
     * @return mixed
     * @throws BindingResolutionException
     * @throws LogicException
     * @throws InvalidArgumentException
     */
    protected function isSubscribeEvent()
    {
        if ($this->message->isSubscribeEvent()) {
            //根据OPENID获取用户资料
            $account = app(User::class)->getByOpenid($this->message->FromUserName);
            //保存到网站数据库
            WeChatService::saveUser($account + ['wechat_id' => $this->model->id]);
            return $this->message->text($this->model->welcome ?? '感谢您的关注');
        }
    }
}
