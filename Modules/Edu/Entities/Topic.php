<?php

namespace Modules\Edu\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Auth;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Edu\Entities\Comment;

/**
 * 贴子
 * @package Modules\Edu\Entities
 */
class Topic extends Model
{
    // use Favorite, Favour, Activity, Comment;
    // protected static $recordEvents = ['created'];
    protected $table = 'edu_topic';
    protected $fillable = ['title', 'content'];
    protected $casts = [
        'recommend' => 'boolean',
    ];

    protected $appends = [
        'permissions'
    ];

    public function getPermissionsAttribute()
    {
        return [
            'view' => Auth::check() && Auth::user()->can('view', $this),
            'update' => Auth::check() && Auth::user()->can('update', $this),
            'delete' => Auth::check() && Auth::user()->can('delete', $this),
            'recommend' => Auth::check() && Auth::user()->can('recommend', $this)
        ];
    }

    /**
     * 用户
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 标签
     * @return MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'relation', 'edu_tag_relation');
    }

    /**
     * 搜索
     * @param mixed $query
     * @param mixed $w
     * @return mixed
     */
    public function scopeSearch($query, $w)
    {
        if (empty($w)) {
            return $query;
        }

        return $query->where('title', 'like', "%{$w}%");
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
