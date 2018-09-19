<?php

namespace App\Observers;

use App\Models\Comment;
use App\Notifications\CommentNotification;

class CommentObserver
{
    public function created(Comment $comment)
    {
        $comment->belongModel->user->notify(new CommentNotification($comment));
    }

    /**
     * Handle the comment "updated" event.
     *
     * @param  \App\Models\Comment $comment
     * @return void
     */
    public function updated(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "deleted" event.
     *
     * @param  \App\Models\Comment $comment
     * @return void
     */
    public function deleted(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "restored" event.
     *
     * @param  \App\Models\Comment $comment
     * @return void
     */
    public function restored(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "force deleted" event.
     *
     * @param  \App\Models\Comment $comment
     * @return void
     */
    public function forceDeleted(Comment $comment)
    {
        //
    }
}
