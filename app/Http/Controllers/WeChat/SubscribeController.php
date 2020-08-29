<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use Houdunwang\WeChat\WeChat;
use Houdunwang\WeChat\Message;
use Illuminate\Http\Request;
use Log;

class SubscribeController extends Controller
{
    public function handle(Request $request, WeChat $weChat, Message $message)
    {
        // return $message->text($message->Content);
        return $message->news([
            ['title' => 'aa', 'description' => 'dd', 'picurl' => '33', 'url' => 'df']
        ]);
    }
}
