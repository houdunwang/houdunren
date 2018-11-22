<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Observers;

use App\Models\Comment;
use App\Notifications\CommentNotification;

class CommentObserver
{
    public function creating(Comment $comment)
    {
    }

    public function created(Comment $comment)
    {
        $comment->belongModel->user->notify(new CommentNotification($comment));
    }

    public function updated(Comment $comment)
    {
    }

    public function deleting(Comment $comment)
    {
    }

    public function deleted(Comment $comment)
    {
        $comment->activity()->delete();
    }

    public function restored(Comment $comment)
    {
    }

    public function forceDeleted(Comment $comment)
    {
    }
}
