<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\Button\Create;
use Houdunwang\WeChat\Button\MessageType;

class Button extends WeChat
{
    use Create, MessageType;
}
