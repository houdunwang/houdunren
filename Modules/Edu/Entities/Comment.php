<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Auth;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 评论
 * @package Modules\Edu\Entities
 */
class Comment extends Model
{
    protected $table = 'edu_comment';

    protected $fillable = ['content', 'user_id', 'site_id', 'reply_user_id'];
    protected $appends = ['permissions'];
    /**
     * 模型权限
     * @return void
     */
    public function getPermissionsAttribute()
    {
        return [
            'view' => Auth::check() && Auth::user()->can('view', $this),
            'update' => Auth::check() && Auth::user()->can('update', $this),
            'delete' => Auth::check() && Auth::user()->can('delete', $this)
        ];
    }

    public function getPageAttribute($page = 15)
    {
        $total = self::where('site', site()['id'])->latest()->where('id', '<', $this->id)->count();
        return ceil($total / $page);
    }

    /**
     * 回复列表
     * @return HasMany
     */
    public function replys()
    {
        return $this->hasMany(self::class, 'reply_id');
    }

    /**
     * 发表用户
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 多态关联
     * @return MorphTo
     */
    public function commentable()
    {
        return $this->morphTo('comment');
    }
}
