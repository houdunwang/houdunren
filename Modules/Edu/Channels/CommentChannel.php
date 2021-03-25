<?php

namespace Modules\Edu\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Channels\DatabaseChannel;

/**
 * 通知驱动
 * @package Modules\Edu\Channels
 */
class CommentChannel extends DatabaseChannel
{
    protected function buildPayload($notifiable, Notification $notification)
    {
        return [
            'id' => $notification->id,
            'type' => get_class($notification),
            'data' => $this->getData($notifiable, $notification),
            'read_at' => null,
            //自定义字段
            'site_id' => site('id'),
            'module_id' => module('id'),
        ];
    }
}
