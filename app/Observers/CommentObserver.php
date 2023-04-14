<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Comment;
use App\Models\User;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification;

class CommentObserver
{
    public function created(Comment $comment)
    {
        activityLog(
            request('module'),
            $comment,
            $comment->model->title,
            ['module' => request('module'), 'model' => request('model'), 'model_id' => $comment->commentable_id]
        );

        //评论或视频作者通知
        $modelUser = $comment->model->user_id ? $comment->model->user : User::find(1);
        if ($modelUser->id != $comment->user_id) {
            Notification::send($modelUser, new CommentNotification($comment));
        }

        //回复
        if ($comment->reply_user_id && ($comment->reply_user_id != $modelUser->id)) {
            Notification::send($comment->replyUser, new CommentNotification($comment));
        }
    }

    public function deleted(Comment $comment)
    {
        Activity::where('subject_type', 'App\Models\Comment')->where('subject_id', $comment->id)->delete();
    }
}
