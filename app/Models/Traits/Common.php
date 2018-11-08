<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Models\Traits;

use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Notification;
use App\User;
use App\Models\Zan;
use Spatie\Activitylog\Models\Activity;

trait Common
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

    //收藏表关联
    public function favorite()
    {
        return $this->morphMany(Favorite::class, 'favorite');
    }

    //动态日志
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    //用户是否收藏文章
    public function isFavorite(User $user)
    {
        return $this->favorite()->where('user_id', $user['id'])->first();
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
}
