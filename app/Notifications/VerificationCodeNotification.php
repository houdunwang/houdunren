<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

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
        $webname = config('app.name');
        return (new MailMessage)
            ->greeting($webname  . "验证码")
            ->line("你在「{$webname}」的验证码是：" . $this->code);
    }


    public function toArray($notifiable)
    {
        return [];
    }
}
