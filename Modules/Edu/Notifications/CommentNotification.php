<?php

namespace Modules\Edu\Notifications;

use Modules\Edu\Channels\CommentChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * 评论通知
 * @package Modules\Edu\Notifications
 */
class CommentNotification extends Notification
{
    use Queueable;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * 通知通道
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [CommentChannel::class];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', 'https://laravel.com')
            ->line('Thank you for using our application!');
    }

    /**
     * 通知的数组数据.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->model->id,
            'model' => basename(str_replace('\\', '/', get_class($this->model))),
        ];
    }
}
