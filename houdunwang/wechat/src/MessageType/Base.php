<?php

namespace Houdunwang\WeChat\MessageType;

use Log;

/**
 * 普通消息类型
 */
trait Base
{
    /**
     * 文本消息
     * @return bool
     */
    public function isTextMessage()
    {
        return $this->message->MsgType == 'text';
    }

    /**
     * 图片消息
     * @return bool
     */
    public function isImageMessage()
    {
        return $this->message->MsgType == 'image';
    }

    /**
     * 语音消息
     * @return bool
     */
    public function isVoiceMessage()
    {
        return $this->message->MsgType == 'voice';
    }

    /**
     * 视频消息
     * @return bool
     */
    public function isVideoMessage()
    {
        return $this->message->MsgType == 'video';
    }

    /**
     * 小视频消息
     * @return bool
     */
    public function isShortVideoMessage()
    {
        return $this->message->MsgType == 'shortvideo';
    }

    /**
     * 地理位置消息
     * @return bool
     */
    public function isLocationMessage()
    {
        return $this->message->MsgType == 'location';
    }

    /**
     * 链接消息
     * @return bool
     */
    public function isLinkMessage()
    {
        return $this->message->MsgType == 'link';
    }
}
