<?php

namespace Modules\Edu\Entities;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "edu_comment";
    protected $fillable = ['content', 'user_id', 'site_id', 'reply_user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getHtmlAttribute()
    {
        return Markdown::convertToHtml($this->content);
    }

    public function commentable()
    {
        return $this->morphTo('comment');
    }
}
