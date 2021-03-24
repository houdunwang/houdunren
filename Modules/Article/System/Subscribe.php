<?php

namespace Modules\Article\System;

use App\Models\WeChatMessage;
use Houdunwang\WeChat\Message;

/**
 * 订阅消息
 * @package Modules\Article\System
 */
class Subscribe extends Message
{
    public function isTextMessage()
    {
        return $this->text('333');
    }
}
