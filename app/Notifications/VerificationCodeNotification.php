<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * 验证码邮件通知
 * @package App\Notifications
 */
class VerificationCodeNotification extends Notification
{
    use Queueable;

    protected $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $webname = site()['title'];

        return (new MailMessage)
            ->subject('验证码')
            ->greeting("验证码")
            ->line("您的验证码是：" . $this->code);
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
