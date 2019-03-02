<?php

namespace App\Listeners\Message;

use Houdunwang\Aliyun\Aliyun;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * 短信通知监听器
 * Class NotificationMobileListener
 * @package App\Listeners
 */
class NotificationMobileListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object $event
     * @return void
     */
    public function handle($event)
    {
        Aliyun::config(config_get('aliyun', [], 'site'));
        $event->message['mobile'] = $event->message['to'];
        Aliyun::instance('Sms')->send($event->message);
    }
}
