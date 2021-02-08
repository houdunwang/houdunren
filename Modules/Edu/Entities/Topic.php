<?php

namespace Modules\Edu\Entities;

use App\Models\Traits\Activity;
use App\Models\Traits\Favorite;
use App\Models\Traits\Favour;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Edu\Entities\Traits\Comment;

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
}
