<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 贴子
 * @package Modules\Edu\Entities
 */
class Topic extends Model
{
    protected $table = "edu_topic";
    protected $fillable = ['user_id', 'title', 'content', 'user_id'];
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

    public function comment()
    {
        return $this->morphMany(Comment::class, 'comment');
    }
}
