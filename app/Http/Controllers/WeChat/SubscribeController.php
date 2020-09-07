<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use Houdunwang\WeChat\Message;
use Illuminate\Http\Request;
use App\Models\WeChat as Model;
use App\Models\WeChatKeyword;
use Log;
use Arr;

class SubscribeController extends Controller
{
    protected $wechat;

    protected $message;

    public function handle(Model $model, Message $message)
    {
        $this->wechat = $model;
        $this->message = $message;

        config(['houdunren.wechat' => $model]);
        $message->init();

        if ($message->isSubscribe()) {
            return $message->text($this->wechat->welcome);
        }

        return $this->subscribe($message);

        if ($message->isText()) {
            return $message->text(site()['title']);
        }
    }

    protected function subscribe(Message $message)
    {
        $rule = $this->getWechatRule();
        switch ($rule->type) {
            case 'text':
                return $this->message->text(Arr::random($rule->text->contents));
            case 'news':
                return $this->message->news($rule->news->contents);
        }
    }

    protected function processor(Message $message)
    {
    }

    protected function getWechatRule()
    {
        $keywords = WeChatKeyword::where('site_id', site()['id'])->where('wechat_id', $this->wechat['id'])->get();

        foreach ($keywords as $keyword) {
            if ($keyword['word'] == $this->message->message->Content) {
                return $keyword->rule;
            }
        }
    }
}
