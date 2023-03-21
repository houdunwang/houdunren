<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//模型基础类
abstract class BaseModel extends Model
{
    //用户关联
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //点赞
    public function favours()
    {
        return $this->morphToMany(User::class, 'favour')->withTimestamps();
    }

    //收藏
    public function favorites()
    {
        return $this->morphToMany(User::class, 'favorite')->withTimestamps();
    }

    //评论
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
