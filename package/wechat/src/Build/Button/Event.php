<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDPHP framework]
 * |      Site: www.hdphp.com  www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Houdunwang\WeChat\Build\Button;

/**
 * 按钮消息类型
 * Trait Event
 *
 * @package Houdunwang\WeChat\Build\button
 */
trait Event
{
    //点击菜单拉取消息时的事件
    protected static $BUTTON_EVENT_TYPE_CLICK = 'CLICK';

    //点击菜单跳转链接时的事件
    protected static $BUTTON_EVENT_TYPE_VIEW = 'VIEW';

    //扫码推事件的事件推送
    protected static $BUTTON_EVENT_TYPE_SCANCODE_PUSH = 'scancode_push';

    //扫码推事件且弹出“消息接收中”提示框的事件推送
    protected static $BUTTON_EVENT_TYPE_SCANCODE_WAITMSG = 'scancode_waitmsg';

    //弹出系统拍照发图的事件推送
    protected static $BUTTON_EVENT_TYPE_PIC_SYSPHOTO = 'pic_sysphoto';

    //弹出拍照或者相册发图的事件推送
    protected static $BUTTON_EVENT_TYPE_PIC_PHOTO_OR_ALBUM = 'pic_photo_or_album';

    //弹出微信相册发图器的事件推送
    protected static $BUTTON_EVENT_TYPE_PIC_WEIXIN = 'pic_weixin';

    //弹出地理位置选择器的事件推送
    protected static $BUTTON_EVENT_TYPE_LOCATION_SELECT = 'location_select';

    /**
     * 点击菜单拉取消息时的事件推送
     *
     * @return bool
     */
    public function isClickEvent()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == self::$BUTTON_EVENT_TYPE_CLICK;
    }

    /**
     * 点击菜单跳转链接时的事件推送
     *
     * @return bool
     */
    public function isViewEvent()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == self::$BUTTON_EVENT_TYPE_VIEW;
    }

    /**
     * 扫码推事件的事件推送
     *
     * @return bool
     */
    public function isScancodePush()
    {
        return $this->message->MsgType == 'event'
               && $this->message->Event == self::$BUTTON_EVENT_TYPE_SCANCODE_PUSH;
    }

    /**
     * 扫码推事件且弹出“消息接收中”提示框的事件推送
     *
     * @return bool
     */
    public function isScancodeWaitmsg()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == self::$BUTTON_EVENT_TYPE_SCANCODE_WAITMSG;
    }

    /**
     * 扫码推事件的事件推送
     *
     * @return bool
     */
    public function isPicSysphoto()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == self::$BUTTON_EVENT_TYPE_PIC_SYSPHOTO;
    }

    /**
     * 弹出拍照或者相册发图的事件推送
     *
     * @return bool
     */
    public function isPicPhotoOrAlbum()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == self::$BUTTON_EVENT_TYPE_PIC_PHOTO_OR_ALBUM;
    }

    /**
     * 弹出微信相册发图器的事件推送
     *
     * @return bool
     */
    public function isPicWeixin()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == self::$BUTTON_EVENT_TYPE_PIC_WEIXIN;
    }

    /**
     * 弹出地理位置选择器的事件推送
     *
     * @return bool
     */
    public function isLocationSelect()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == self::$BUTTON_EVENT_TYPE_LOCATION_SELECT;
    }
}
