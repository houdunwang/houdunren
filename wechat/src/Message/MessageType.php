<?php

namespace Houdunwang\WeChat\Message;

use Log;

trait MessageType
{
    public function isText()
    {
        return $this->message->MsgType == 'text';
    }

    public function isImage()
    {
        return $this->message->MsgType == 'image';
    }

    public function isSubscribe()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'subscribe';
    }
}
