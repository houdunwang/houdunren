<?php

namespace Houdunwang\WeChat\Button;

use Log;

trait MessageType
{
    public function isClient()
    {
        return $this->message->MsgType == 'event';
    }
}
