<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Activitylog\Models\Activity;

class Lesson extends Model
{
    protected $table = 'edu_lessons';
    protected $fillable = ['site_id', 'user_id', 'title', 'description', 'thumb', 'type', 'status', 'free_num', 'price', 'is_commend', 'video_num', 'download_address'];
    protected $casts = ['is_commend' => 'boolean', 'status' => 'boolean'];
    // //动态
    // protected static $logAttributes = ['title'];
    // protected static $recordEvents = ['created', 'updated'];
    // protected static $logName = 'lesson';
    // protected static $submitEmptyLogs = false;
    // protected static $ignoreChangedAttributes = ['favour_count', 'favorite_count', 'read_num', 'comment_count', 'updated_at'];
    // public function tapActivity(Activity $activity, string $eventName)
    // {
    //     $activity->site_id = SITEID;
    //     $activity->module_id = module()['id'];
    // }
    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }

    public function video()
    {
        return $this->hasMany(Video::class, 'lesson_id');
    }

    public function tag()
    {
        return $this->morphToMany(Tag::class, 'relation', 'edu_tag_relation');
    }
    /**
     * 点赞
     * @return MorphToMany
     */
    public function favour()
    {
        return $this->morphToMany(User::class, 'favour', 'edu_favour')->withTimestamps();
    }

    public function isFavour(User $user)
    {
        return (bool) $this->favour()->where('user_id', $user['id'])->first();
    }
    /**
     * 收藏
     * @return MorphToMany
     */
    public function favorite()
    {
        return $this->morphToMany(User::class, 'favorite', 'edu_favorite')->withTimestamps();
    }

    public function isFavorite(User $user)
    {
        return (bool) $this->favorite()->where('user_id', $user['id'])->first();
    }
}
