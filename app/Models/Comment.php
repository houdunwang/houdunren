<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//评论
class Comment extends Model
{
    //获得拥有此评论的模型
    public function commentable()
    {
        return $this->morphTo();
    }
}
