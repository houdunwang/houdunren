<?php

namespace Modules\Edu\Observers;

use Modules\Edu\Entities\Comment;

/**
 * 评论观察者
 * @package Modules\Edu\Observers
 */
class CommentObserver
{
    /**
     * 评论发送成功时发送通知
     * @param Comment $comment
     * @return void
     */
    public function created(Comment $comment)
    {
    }
}
