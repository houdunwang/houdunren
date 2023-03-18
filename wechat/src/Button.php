<?php

namespace Houdunwang\Wechat;

use Houdunwang\Wechat\Button\Create;
use Houdunwang\Wechat\Button\MessageType;

/**
 * 微信菜单
 * @package Houdunwang\Wechat
 */
class Button extends WeChat
{
  use Create, MessageType;
}
