<?php

namespace Modules\Edu\System;

use App\Models\WeChatRule;
use Houdunwang\WeChat\Message;
use Log;

/**
 * 微信消息处理器
 * @package Modules\Edu\System
 */
class Subscribe
{
    public function handle(WeChatRule $rule, Message $message)
    {
    }
}
