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
 * 事件消息
 * Trait Event
 *
 * @package Houdunwang\WeChat\Build\message
 */
trait Event
{
    //关注事件
    protected static $EVENT_TYPE_SUBSCRIBE = 'subscribe';

    //取消关注事件
    protected static $EVENT_TYPE_UNSUBSCRIBE = 'unsubscribe';

    //未关注用户扫描二维码事件
    protected static $EVENT_TYPE_UNSUBSCRIBE_SCAN = 'subscribe';

    //关注用户扫描二维码事件
    protected static $EVENT_TYPE_SUBSCRIBE_SCAN = 'SCAN';

    //上报地理位置事件
    protected static $EVENT_TYPE_LOCATION = 'LOCATION';

    //点击菜单的事件类型
    protected static $EVENT_TYPE_EVENT = 'event';

    /**
     * 关注
     *
     * @return bool
     */
    public function isSubscribeEvent()
    {
        return $this->message->MsgType == 'event'
               && $this->message->Event == self::$EVENT_TYPE_SUBSCRIBE;
    }

    /**
     * 取消关注
     *
     * @return bool
     */
    public function isUnSubscribeEvent()
    {
        return $this->message->MsgType == 'event'
               && $this->message->Event == self::$EVENT_TYPE_UNSUBSCRIBE;
    }

    /**
     * 未关注用户扫描二维码
     *
     * @return bool
     */
    public function isSubscribeScanEvent()
    {
        return $this->message->MsgType == 'event'
               && $this->message->Event == self::$EVENT_TYPE_UNSUBSCRIBE_SCAN
               && isset($this->message->EventKey)
               && isset($this->message->Ticket);
    }

    /**
     * 已关注用户扫描二维码
     *
     * @return bool
     */
    public function isScanEvent()
    {
        return $this->message->MsgType == 'event'
               && $this->message->Event == self::$EVENT_TYPE_SUBSCRIBE_SCAN
               && isset($this->message->EventKey)
               && isset($this->message->Ticket);;
    }

    /**
     * 上报地理位置事件
     *
     * @return bool
     */
    public function isLocationEvent()
    {
        return $this->message->MsgType == 'event'
               && $this->message->Event == self::$EVENT_TYPE_LOCATION;
    }
}
