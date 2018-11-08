<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ZanNotification extends Notification
{
    use Queueable;
    protected $zan;

    /**
     * ZanNotification constructor.
     * @param $zan
     */
    public function __construct($zan)
    {
        $this->zan = $zan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->zan->user->id,
            'user_name' => $this->zan->user->name,
            'user_icon' => $this->zan->user->avatar,
            'active' => '赞了',
            'title' => $this->zan->belongModel->title(),
            'link' => $this->zan->belongModel->link(),
        ];
    }
}
