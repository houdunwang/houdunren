<?php

namespace Houdunwang\WeChat\MessageType;

use Houdunwang\WeChat\MessageType\Traits\Base;
use Houdunwang\WeChat\MessageType\Traits\Button;
use Houdunwang\WeChat\MessageType\Traits\Event;
use Log;

/**
 * 消息类型
 * @package Houdunwang\WeChat\MessageType
 */
class MessageType
{
    use Base, Button, Event;
}
