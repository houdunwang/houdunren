<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Builder;
use Modules\Edu\Entities\Tag;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

/**
 * 课程
 * @package Modules\Edu\Entities
 */
class Lesson extends Model
{

    protected $table = 'edu_lessons';

    protected $fillable = [
        'site_id', 'user_id', 'title', 'description', 'thumb', 'type', 'status', 'free_num', 'price', 'is_commend', 'video_num', 'download_address', 'read_num', 'comment_num', 'favour_count', 'favorite_count'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * 模型权限
     * @return void
     */
    public function getPermissionsAttribute()
    {
        return [
            'view' => Auth::check() && Auth::user()->can('view', $this),
            'update' => Auth::check() && Auth::user()->can('update', $this),
            'delete' => Auth::check() && Auth::user()->can('delete', $this),
            'play' => Auth::check() && Auth::user()->can('play', $this)
        ];
    }

    /**
     * 标签关联
     *
     * @return mixed
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'relation', 'edu_tag_relation');
    }

    /**
     * 视频关联
     * @return mixed
     */
    public function videos()
    {
        return $this->hasMany(Video::class)->orderBy('rank', 'asc');
    }

    /**
     * 搜索关键字
     * @param Builder $query
     * @param string $keyword
     * @return void
     */
    public function scopeSearch(Builder $query, string $keyword)
    {
        return $query->where('title', 'like', "%{$keyword}%");
    }

    /**
     * 用户关联
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
