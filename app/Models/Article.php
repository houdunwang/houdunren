<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content'];

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
