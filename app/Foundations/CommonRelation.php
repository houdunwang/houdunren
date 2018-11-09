<?php

namespace App\Models\Foundations;

use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Notification;
use App\User;
use App\Models\Zan;
use Spatie\Activitylog\Models\Activity;

/**
 * 基本公共关联定义
 * Trait CommonRelation
 * @package App\Models\Foundations
 */
trait CommonRelation
{
    //用户关联
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //点赞关联
    public function zan()
    {
        return $this->morphMany(Zan::class, 'zan');
    }

    //动态关联
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    //通知关联
    public function notification()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    //评论关联
    public function comment()
    {
        return $this->morphMany(Comment::class, 'comment');
    }

    //收藏关联
    public function favorite()
    {
        return $this->morphMany(Favorite::class, 'favorite');
    }

    //是否收藏
    public function isFavorite(User $user)
    {
        return $this->favorite()->where('user_id', $user['id'])->first();
    }
}
