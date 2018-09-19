<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Models\Traits;

use App\Models\Comment;
use App\Models\Favorite;
use App\User;
use App\Models\Zan;
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

    //用户是否收藏文章
    public function isFavorite(User $user)
    {
        return $this->favorite()->where('user_id', $user['id'])->first();
    }

    //评论关联
    public function comment()
    {
        return $this->morphMany(Comment::class, 'comment');
    }

}
