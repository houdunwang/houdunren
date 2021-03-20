<?php

namespace App\WeChat\Processors;

use App\WeChat\Processors\Processor;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Log;

/**
 * 文本消息
 * @package App\WeChat\Message
 */
class Text extends Processor
{
    public function handle()
    {
        if ($this->message->isText()) {
            return $this->reply($this->message->Content);
        }
    }
}
