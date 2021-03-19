<?php

namespace Houdunwang\WeChat\MessageType;

use Log;

/**
 * 按钮消息类型
 */
trait Button
{
    /**
     * 点击菜单拉取消息时的事件推送
     * @return bool
     */
    public function isButtonClick()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'CLICK';
    }

    /**
     * 点击菜单跳转链接时的事件推送
     * @return bool
     */
    public function isButtonView()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'VIEW';
    }

    /**
     * 扫码推事件的事件推送
     * @return bool
     */
    public function isButtonScanCodePush()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'scancode_push';
    }

    /**
     * 扫码推事件且弹出“消息接收中”提示框的事件推送
     * @return bool
     */
    public function isButtonScanCodeWaitmsg()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'scancode_waitmsg';
    }

    /**
     * 弹出系统拍照发图的事件推送
     * @return bool
     */
    public function isButtonPicSysPhoto()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'pic_sysphoto';
    }


    /**
     * 弹出拍照或者相册发图的事件推送
     * @return bool
     */
    public function isButtonPicPhotoOrAlbum()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'pic_photo_or_album';
    }

    /**
     * 弹出微信相册发图器的事件推送
     * @return bool
     */
    public function isButtonPicWeixin()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'pic_weixin';
    }

    /**
     * 弹出微信相册发图器的事件推送
     * @return bool
     */
    public function isButtonLocationSelect()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'location_select';
    }

    /**
     * 点击菜单跳转小程序的事件推送
     * @return bool
     */
    public function isButtonViewMiniProgram()
    {
        return $this->message->MsgType == 'event' && $this->message->Event == 'view_miniprogram';
    }
}
