<?php

namespace Modules\Edu\Observers;

use Modules\Edu\Entities\Comment;
use DB;

class CommentObserver
{
    public function creating(Comment $comment)
    {
        $comment['content'] = preg_replace('/@.*?\s/', '', $comment['content']);
    }

    public function created(Comment $comment)
    {
    }

    public function updated(Comment $comment)
    {
    }

    public function deleted(Comment $comment)
    {
        DB::table('edu_comment')->where('reply_id', $comment['id'])->delete();
    }

    /**
     * Handle the Comment "restored" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function restored(Comment $comment)
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function forceDeleted(Comment $comment)
    {
        //
    }
}
