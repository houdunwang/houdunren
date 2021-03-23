<?php

namespace App\WeChat\Processors\Handles;

use App\WeChat\Processors\Processor;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Log;
use LogicException;

/**
 * 普通消息消息
 * @package App\WeChat\Message
 */
class Base extends Processor
{
    //事件处理集
    protected $processes = ['isTextMessage', 'isImageMessage'];

    public function handle()
    {
        foreach ($this->processes as $action) {
            if ($content = $this->$action()) {
                return $content;
            }
        }
    }

    /**
     * 文本消息
     * @return mixed
     * @throws BindingResolutionException
     * @throws LogicException
     * @throws InvalidArgumentException
     */
    public function isTextMessage()
    {
        if ($this->message->isTextMessage()) {
            return $this->reply($this->message->Content);
        }
    }


    public function isImageMessage()
    {
        if ($this->message->isImageMessage()) {
            Log::info(json_decode(json_encode($this->message->message()), true));
            //     return $this->reply($this->message->Content);
        }
    }
}
