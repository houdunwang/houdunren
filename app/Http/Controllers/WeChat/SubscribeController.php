<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use Houdunwang\WeChat\Message;
use Illuminate\Http\Request;
use App\Models\WeChat as Model;
use Log;

class SubscribeController extends Controller
{
    protected $wechat;

    public function handle(Model $model, Message $message)
    {
        config(['houdunren.wechat' => $model]);
        $message->init();

        if ($message->isSubscribe()) {
            return $message->text($this->wechat->welcome);
        }

        if ($message->isText()) {
            return $message->text(site()['title']);
        }
    }
}
