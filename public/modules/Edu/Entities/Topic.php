<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Entities\Traits\Common;

/**
 * 贴子
 * @package Modules\Edu\Entities
 */
class Topic extends Model
{
    use Common;
    protected $table = "edu_topic";
    protected $fillable = ['user_id', 'title', 'content', 'user_id'];
    //日志
    // protected static $logAttributes = ['title'];
    // protected static $recordEvents = ['created', 'updated'];
    // protected static $logName = 'topic';
    // protected static $submitEmptyLogs = false;
    // protected static $ignoreChangedAttributes = ['favour_count', 'favorite_count', 'comment_count', 'updated_at'];
    // public function tapActivity(Activity $activity, string $eventName)
    // {
    //     $activity->site_id = SITEID;
    //     $activity->module_id = module()['id'];
    // }

    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'relation', 'edu_tag_relation');
    }
}
