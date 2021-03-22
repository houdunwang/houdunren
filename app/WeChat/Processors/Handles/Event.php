<?php

namespace App\WeChat\Processors\Handles;

use App\WeChat\Processors\Processor;
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
            return $this->reply($this->model->welcome);
        }
    }
}
