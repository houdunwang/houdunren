<?php

namespace App\WeChat\Processors;

use App\WeChat\Processors\Processor;
use Houdunwang\WeChat\Button;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Log;
use LogicException;

/**
 * 事件消息
 * @package App\WeChat\Message
 */
class Event extends Processor
{
    //事件处理集
    protected $processes = ['button', 'subscribe'];

    public function handle()
    {
        foreach ($this->processes as $action) {
            if ($content = $this->$action()) {
                return $content;
            }
        }
    }

    /**
     * 菜单事件
     * @return mixed
     * @throws BindingResolutionException
     * @throws LogicException
     * @throws InvalidArgumentException
     */
    protected function button()
    {
        $button = app(Button::class);
        if ($button->isClick()) {
            return $this->reply($this->message->EventKey);
        }
    }

    /**
     * 关注事件
     * @return mixed
     * @throws BindingResolutionException
     * @throws LogicException
     * @throws InvalidArgumentException
     */
    protected function subscribe()
    {
        if ($this->message->isSubscribe()) {
            return $this->reply($this->model->welcome);
        }
    }
}
