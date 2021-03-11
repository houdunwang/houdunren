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
            // if ($content = $this->reply($this->message->Content)) {
            //     return $content;
            // }
            //无消息时返回默认消息
            return $this->defaultMessage();
        }
    }

    /**
     * 默认回复消息
     * @return mixed
     * @throws BindingResolutionException
     * @throws InvalidArgumentException
     */
    protected function defaultMessage()
    {
        $message  = $this->model['default_message'] ?? '您的消息我们已经收到';
        // if ($content = $this->reply($message)) {
        //     return $content;
        // }
        return $this->message->text($message);
    }
}
