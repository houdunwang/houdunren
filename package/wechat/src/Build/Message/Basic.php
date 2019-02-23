<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDPHP framework]
 * |      Site: www.hdphp.com  www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Houdunwang\WeChat\Build\Message;

/**
 * 消息类型
 * Trait Mold
 *
 * @package Houdunwang\WeChat\Build\traits
 */
trait Basic
{
    //请求文本消息
    protected static $MSG_TYPE_TEXT = 'text';

    //请求图片消息
    protected static $MSG_TYPE_IMAGE = 'image';

    //请求语音消息
    protected static $MSG_TYPE_VOICE = 'voice';

    //请求地理位置消息
    protected static $MSG_TYPE_LOCATION = 'location';

    //请求链接消息
    protected static $MSG_TYPE_LINK = 'link';

    //请求小视频消息
    protected static $MSG_TYPE_SMALL_VIDEO = 'shortvideo';

    //请求视频消息
    protected static $MSG_TYPE_VIDEO = 'video';

    /**
     * 文本消息
     *
     * @return bool
     */
    public function isTextMsg()
    {
        return $this->message->MsgType == self::$MSG_TYPE_TEXT;
    }

    /**
     * 图像消息
     *
     * @return bool
     */
    public function isImageMsg()
    {
        return $this->message->MsgType == self::$MSG_TYPE_IMAGE;
    }

    /**
     * 语音消息
     *
     * @return bool
     */
    public function isVoiceMsg()
    {
        return $this->message->MsgType == self::$MSG_TYPE_VOICE;
    }

    /**
     * 地址消息
     *
     * @return bool
     */
    public function isLocationMsg()
    {
        return $this->message->MsgType == self::$MSG_TYPE_LOCATION;
    }

    /**
     * 链接消息
     *
     * @return bool
     */
    public function isLinkMsg()
    {
        return $this->message->MsgType == self::$MSG_TYPE_LINK;
    }

    /**
     * 视频消息
     *
     * @return bool
     */
    public function isVideoMsg()
    {
        return $this->message->MsgType == self::$MSG_TYPE_VIDEO;
    }

    /**
     * 小视频消息
     *
     * @return bool
     */
    public function isSmallVideoMsg()
    {
        return $this->message->MsgType == self::$MSG_TYPE_SMALL_VIDEO;
    }
}
