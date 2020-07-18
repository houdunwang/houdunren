<?php

namespace Modules\Edu\Notifications;

use App\Channels\MessageChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Edu\Entities\Comment;

class CommentNotification extends Notification
{
    use Queueable;

    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function via($notifiable)
    {
        return [MessageChannel::class];
    }

    public function toArray($notifiable)
    {
        return [
            'id' => $this->comment->id,
            'title' => strip_tags($this->comment->content),
            'link' => $this->comment->commentable->link().'#comment-'.$this->comment->id
        ];
    }
}
