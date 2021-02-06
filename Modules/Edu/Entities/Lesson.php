<?php

namespace Modules\Edu\Entities;

use App\Models\BaseModel;
use App\Models\Traits\Favorite;
use App\Models\Traits\Favour;
use Illuminate\Database\Eloquent\Builder;
use Modules\Edu\Entities\Tag;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 课程
 * @package Modules\Edu\Entities
 */
class Lesson extends BaseModel
{
    use Favour, Favorite, LogsActivity;

    protected static $recordEvents = ['created'];

    protected $table = 'edu_lessons';

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];

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
     * 按标签搜索
     * @param [type] $query
     * @param string $tag
     * @return void
     */
    // public function scopeSearchByTag($query, string $tag)
    // {
    //     return $this->whereHas('tags', function (Builder $query) use ($tag) {
    //         $query->where('title', 'like', "$tag%");
    //     });
    // }
}
