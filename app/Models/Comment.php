<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'reply_user_id', 'comment_id', 'content'];

    protected $with = ['user', 'replyUser', 'replys'];

    protected $touches = ['model', 'comment'];

    protected $appends = ['html'];

    //评论或回复用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //markdown 转 HTML
    public function getHtmlAttribute()
    {
        return Markdown::convert($this->content)->getContent();
    }

    //回复的评论
    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    //回复用户
    public function replyUser()
    {
        return $this->belongsTo(User::class, 'reply_user_id');
    }

    //回复列表
    public function replys()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }

    //关联模型
    public function model()
    {
        return $this->morphTo('commentable');
    }
}
