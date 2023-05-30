<?php

namespace Houdunwang\Wechat;

use Houdunwang\Wechat\Message\MessageType;
use Houdunwang\Wechat\Message\Send;
use Log;

/**
 * 被动消息
 * @package Houdunwang\Wechat
 */
class Message extends Wechat
{
    use Send, MessageType;
}
