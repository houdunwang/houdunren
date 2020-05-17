<?php

namespace Modules\Edu\Observers;

use App\Services\ActivityService;
use Modules\Edu\Entities\Comment;
use Parsedown;

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
        $Parsedown = new Parsedown();
        $content = strip_tags($Parsedown->text($comment['content']));
        if ($content) {
            app(ActivityService::class)->save('comment', 'created', $comment, [
                'title' => $content,
                'type' => $comment['comment_type']
            ]);
        }
    }
}
