<?php

namespace Modules\Edu\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Modules\Edu\Entities\Tag;

/**
 * 课程
 * @package Modules\Edu\Entities
 */
class Lesson extends BaseModel
{

    protected $table = 'edu_lessons';

    protected $fillable = [
        'site_id', 'user_id', 'title', 'description', 'thumb', 'type', 'status', 'free_num', 'price', 'is_commend', 'video_num', 'download_address', 'read_num', 'comment_num', 'favour_count', 'favorite_count'
    ];

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
