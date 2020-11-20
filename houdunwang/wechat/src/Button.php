<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\Button\Create;
use Houdunwang\WeChat\Button\MessageType;

/**
 * 微信菜单
 * @package Houdunwang\WeChat
 */
class Button extends WeChat
{
  use Create, MessageType;
}
