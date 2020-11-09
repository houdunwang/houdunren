<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\Message\MessageType;
use Houdunwang\WeChat\Message\Send;
use Log;

/**
 * 被动消息
 * @package Houdunwang\WeChat
 */
class Message extends WeChat
{
  use Send, MessageType;
}
