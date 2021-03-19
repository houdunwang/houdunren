<?php

namespace Houdunwang\WeChat\MessageType;

use Log;

/**
 * 按钮消息类型
 */
trait Event
{
    /**
     * 订阅消息
     * @return bool
     */
    public function isEventSubscribe()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'subscribe';
    }

    /**
     * 取消订阅
     * @return bool
     */
    public function isEventUnSubscribe()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'unsubscribe';
    }

    /**
     * 扫描带参数二维码事件
     * 用户未关注时，进行关注后的事件推送
     * @return bool
     */
    public function isEventQrSubscribe()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'subscribe' && $this->message->Ticket;
    }

    /**
     * 扫描带参数二维码事件
     * 用户已关注时的事件推送
     * @return bool
     */
    public function isEventQrScan()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'SCAN';
    }

    /**
     * 上报地理位置事件
     * @return bool
     */
    public function isEventLocation()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'LOCATION';
    }

    /**
     * 点击菜单拉取消息时的事件推送
     * @return bool
     */
    public function isEventButtonClick()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'CLICK' && $this->message->EventKey;
    }

    /**
     * 点击菜单拉取消息时的事件推送
     * @return bool
     */
    public function isEventButtonView()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'VIEW' && $this->message->EventKey;
    }
}
