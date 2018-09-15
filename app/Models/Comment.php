<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

//评论
class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'url'];

    //获得拥有此评论的模型
    public function relationModel()
    {
        return $this->morphTo('comment');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //点赞关联
    public function zan()
    {
        return $this->morphMany(Zan::class, 'zan');
    }
}
