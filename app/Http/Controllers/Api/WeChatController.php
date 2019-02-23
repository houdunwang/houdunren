<?php

namespace App\Http\Controllers\Api;

use App\Models\Site;
use App\Servers\WeChatServer;
use App\Http\Controllers\Controller;
use Houdunwang\WeChat\WeChat;

class WeChatController extends Controller
{
    /**
     * 微信服务接口
     * @param Site $site
     * @param WeChatServer $weChatServer
     * @return string
     */
    public function processor(Site $site, WeChatServer $weChatServer)
    {
        WeChat::config([]);
        //return $weChatServer->handle();
    }
}
