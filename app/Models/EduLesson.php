<?php

namespace App\Models;

use App\Foundations\CommonRelation;
use App\Observers\EduLessonObserver;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 视频课程
 * Class EduLesson
 * @package App\Models
 */
class EduLesson extends Model
{
    use CommonRelation, LogsActivity, Searchable;

    protected static $logName = 'edu_lesson';

    protected $fillable = [
        'id',
        'title',
        'user_id',
        'description',
        'thumb',
        'type',
        'free',
        'subscribe_free_play',
        'free_num',
        'price',
        'is_commend',
        'is_hot',
        'click',
        'times',
        'status',
        'download_address',
        'user_id',
    ];

    protected $casts = [];

    //配置algolia可搜索属性
    public function toSearchableArray()
    {
        return ['title' => $this['title'], 'description' => $this['description'],];
    }

    //全站动态
    public $activity = ['title' => '课程', 'action' => '发布了'];

    public function tags()
    {
        return $this->morphToMany(EduTag::class, 'relation', 'edu_tag_relations', 'relation_id');

    }

    public function hasTag(EduTag $tag)
    {
        return $this->tags->pluck('id')->search($tag['id']) !== false;
    }

    public function userLesson()
    {
        return $this->belongsToMany(User::class, 'edu_user_lessons', 'lesson_id', 'user_id');
    }

    public function video()
    {
        return $this->hasMany(EduVideo::class, 'lesson_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function title()
    {
        return ' [课程] ' . $this->title;
    }

    public function link(string $param = '')
    {
        return route('edu.lesson.show', $this) . $param;
    }
}
