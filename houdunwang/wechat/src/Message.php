<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\Message\Send;
use Houdunwang\WeChat\WeChat;
use Log;

/**
 * 发送消息
 * @package Houdunwang\WeChat\Message
 */
class Message extends WeChat
{
    use Send;
}
