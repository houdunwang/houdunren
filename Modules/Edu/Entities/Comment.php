<?php

namespace Modules\Edu\Entities;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Activity;
use App\Models\User;
use Carbon\Carbon;

class Comment extends Model
{
    use Activity;

    protected $table = "edu_comment";

    protected $fillable = ['content', 'user_id', 'site_id', 'reply_user_id'];

    protected static $recordEvents = ['created'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reply_user()
    {
        return $this->belongsTo(User::class, 'reply_user_id');
    }

    public function getHtmlAttribute()
    {
        if ($this->updated_at < Carbon::create(2020, 6, 1)) {
            return $this->content;
        }

        $Parsedown = new \Parsedown();
        return $Parsedown->setSafeMode(true)->text($this->content);
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
