<?php

namespace App\Http\Controllers\WeChatApi\Message;

use App\Http\Controllers\WeChatApi\Traits\Reply;
use App\Models\WeChat;
use App\Services\WeChatService;
use Houdunwang\WeChat\Auth;
use Houdunwang\WeChat\Auth\Authorize;
use Houdunwang\WeChat\Button;
use Houdunwang\WeChat\Message;
use Houdunwang\WeChat\User;
use Log;

class Event
{
    use Reply;
    protected $model;
    protected $message;

    public function handle(WeChat $model, Message $message)
    {
        $this->model = $model;
        $this->message = $message;
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
