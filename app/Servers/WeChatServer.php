<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-23
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Models\WeChat;

/**
 * 微信处理服务
 * Class WeChatServer
 * @package App\Servers
 */
class WeChatServer
{
    /**
     * 加载配置项
     * @param WeChat $weChat
     * @return $this
     */
    public function config(WeChat $weChat)
    {
        \Houdunwang\WeChat\WeChat::config($weChat);
        return $this;
    }
}