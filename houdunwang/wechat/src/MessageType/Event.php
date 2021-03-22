<?php

namespace Houdunwang\WeChat\MessageType;

use Log;

/**
 * 按钮消息类型
 */
trait Event
{
    /**
     * 关注事件
     * @return bool
     */
    public function isSubscribeEvent()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'subscribe';
    }

    /**
     * 取消关注事件
     * @return bool
     */
    public function isUnSubscribeEvent()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'unsubscribe';
    }

    /**
     * 扫描带参数二维码事件
     * 用户未关注时，进行关注后的事件推送
     * @return bool
     */
    public function isSubscribeScanEvent()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'subscribe' && $this->message->Ticket;
    }

    /**
     * 扫描带参数二维码事件
     * 用户已关注时的事件推送
     * @return bool
     */
    public function isScanEvent()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'SCAN';
    }

    /**
     * 上报地理位置事件
     * @return bool
     */
    public function isLocationEvent()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'LOCATION';
    }
}
