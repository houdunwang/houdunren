<?php

namespace Modules\Article\System;

use App\Models\WeChatMessage;
use Houdunwang\WeChat\Message;

/**
 * 处理模块自定义关键词消息
 * @package Modules\Article\System
 */
class Processor extends Message
{
    /**
     * 消息内容
     * @param WeChatMessage $message
     * @return string
     */
    public function handle(WeChatMessage $message)
    {
        return $this->text('返回的消息内容');
    }
}
