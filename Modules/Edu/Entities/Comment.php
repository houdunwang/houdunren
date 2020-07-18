<?php

namespace Modules\Edu\Entities;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Comment extends Model
{
    use  LogsActivity;

    protected $table = "edu_comment";

    protected $fillable = ['content', 'user_id', 'site_id', 'reply_user_id'];

    protected static $recordEvents = ['created'];

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

    public function link()
    {
        return $this->commentable->link() . '#comment-' . $this->id;
    }
}
