<?php

namespace Houdunwang\Wechat\Message;

use Log;

trait MessageType
{
    public function isText()
    {
        return isset($this->message['MsgType']) &&  $this->message['MsgType'] == 'text';
    }

    public function isImage()
    {
        return isset($this->message['MsgType']) && $this->message['MsgType'] == 'image';
    }

    public function isSubscribe()
    {
        return isset($this->message['MsgType']) && isset($this->message['Event'])
            && $this->message['MsgType'] == 'event' && $this->message['Event'] == 'subscribe';
    }

    public function isScan()
    {
        return isset($this->message['MsgType']) && isset($this->message['Event'])
            && $this->message['MsgType'] == 'event' && $this->message['Event'] == 'SCAN';
    }
}
