<?php

namespace Modules\Edu\Entities;

use App\Models\Site;
use Illuminate\Database\Eloquent\Model;
use Auth;

/**
 * 视频
 * @package Modules\Edu\Entities
 */
class Video extends Model
{
    protected $table = 'edu_videos';
    protected $guarded = [];
    protected $appends = ['Permissions'];

    protected function getPermissionsAttribute()
    {
        return [
            'show' => Auth::check() && Auth::user()->can('view', $this)
        ];
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function user()
    {
        return $this->lesson->user();
    }

    /**
     * 评论关联
     * @return MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'comment');
    }
}
