<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use Houdunwang\WeChat\Message;
use Illuminate\Http\Request;
use App\Models\WeChat as Model;
use App\Models\Site;
use App\Models\WeChat;
use Houdunwang\WeChat\Button;
use Log;

class SubscribeController extends Controller
{
    protected $wechat;

    public function handle(Site $site, Model $wechat, Message $message, Button $button)
    {
        config(['houdunren.wechat' => $wechat->toArray()]);
        $message->init();

        if ($message->isSubscribe()) {
            return $message->text($this->wechat->welcome);
        }

        if ($message->isText()) {
            return $message->text(site()['title']);
        }
    }
}
