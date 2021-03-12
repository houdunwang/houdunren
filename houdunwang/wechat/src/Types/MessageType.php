<?php

namespace Houdunwang\WeChat\Types;

use Houdunwang\WeChat\Types\Traits\Base;
use Houdunwang\WeChat\Types\Traits\Button;
use Houdunwang\WeChat\Types\Traits\Event;
use Log;

/**
 * 消息类型
 * @package Houdunwang\WeChat\Types
 */
class MessageType
{
    use Base, Button, Event;
}
