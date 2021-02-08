<?php

namespace Modules\Edu\Entities;

use App\Models\Site;
use App\Models\Traits\Favorite;
use App\Models\Traits\Favour;
use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Entities\Traits\Comment;
use Auth;

/**
 * 视频
 * @package Modules\Edu\Entities
 */
class Video extends Model
{
    use Favorite, Favour, Comment;
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
}
