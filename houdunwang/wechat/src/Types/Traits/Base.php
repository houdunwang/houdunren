<?php

namespace Houdunwang\WeChat\Types\Traits;

use Log;

/**
 * 基本消息类型
 */
trait Base
{
    /**
     * 文本消息
     * @return bool
     */
    public function isText()
    {
        return $this->message->MsgType == 'text';
    }

    /**
     * 图片消息
     * @return bool
     */
    public function isImage()
    {
        return $this->message->MsgType == 'image';
    }

    /**
     * 语音消息
     * @return bool
     */
    public function isVoice()
    {
        return $this->message->MsgType == 'voice';
    }

    /**
     * 视频消息
     * @return bool
     */
    public function isVideo()
    {
        return $this->message->MsgType == 'video';
    }

    /**
     * 小视频消息
     * @return bool
     */
    public function isShortVideo()
    {
        return $this->message->MsgType == 'shortvideo';
    }

    /**
     * 地理位置消息
     * @return bool
     */
    public function isLocation()
    {
        return $this->message->MsgType == 'location';
    }

    /**
     * 地理位置消息
     * @return bool
     */
    public function isLink()
    {
        return $this->message->MsgType == 'link';
    }
}
