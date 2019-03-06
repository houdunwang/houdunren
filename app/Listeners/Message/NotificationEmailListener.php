<?php

namespace App\Listeners\Message;

use App\Notifications\EmailNotification;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * 邮件通知监听器
 * Class NotificationEmailListener
 * @package App\Listeners
 */
class NotificationEmailListener
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
     * @param $event
     * @return bool
     * @throws \App\Exceptions\ResponseHttpException
     */
    public function handle($event)
    {
        config(['mail' => config_get('email', [], 'site')]);
        if (filter_var($event->message['to'], FILTER_VALIDATE_EMAIL)) {
            $user = new User();
            $user['email'] = $event->message['to'];
            $user->notify(new EmailNotification($event->message));
            return false;
        }
    }
}
