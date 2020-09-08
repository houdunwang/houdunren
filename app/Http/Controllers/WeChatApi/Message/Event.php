<?php

namespace App\Http\Controllers\WeChatApi\Message;

use App\Http\Controllers\WeChatApi\Traits\Reply;
use App\Models\WeChat;
use Houdunwang\WeChat\Message;

class Event
{
    use Reply;

    public function handle(WeChat $model, Message $message)
    {
        foreach (['button', 'subscribe'] as $action) {
            if ($content = $this->$action()) {
                return $content;
            }
        }
    }

    protected function button()
    {
        $button = app(Button::class);

        if ($button->isClient()) {
            return $this->reply($this->message->EventKey);
        }
    }

    protected function subscribe()
    {
        if ($this->message->isSubscribe()) {
            return $this->reply($this->model->welcome);
        }
    }
}
