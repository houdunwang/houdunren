<?php

namespace App\Http\Controllers\WeChatApi\Message;

use App\Http\Controllers\WeChatApi\Traits\Reply;
use App\Models\WeChat;
use Houdunwang\WeChat\Message;
use Log;

class Text
{
    use Reply;

    protected $model;
    protected $message;

    public function handle(WeChat $model, Message $message)
    {
        $this->model = $model;
        $this->message = $message;

        if ($this->message->isText()) {
            foreach (['text', 'defaultReply'] as $action) {
                if ($content = $this->$action()) {
                    return $content;
                }
            }
        }
    }

    protected function text()
    {
        if ($content = $this->reply($this->message->Content)) {
            return $content;
        }
    }

    protected function defaultReply()
    {
        $message  = $this->model['default_message'] ?? '您的消息我们已经收到';

        if ($content = $this->reply($message)) {
            return $content;
        }
        return $this->message->text($message);
    }
}
