<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\Message\MessageType;
use Houdunwang\WeChat\Message\Send;
use Log;

class Message extends WeChat
{
    use Send, MessageType;
}
