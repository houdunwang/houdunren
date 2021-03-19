<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\MessageType\Base;
use Houdunwang\WeChat\MessageType\Button;
use Houdunwang\WeChat\MessageType\Event;
use Log;

/**
 * 消息类型
 * @package Houdunwang\WeChat\Types
 */
class MessageType
{
    use Base, Button, Event;
}
