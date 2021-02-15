<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Auth;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replyUser()
    {
        return $this->belongsTo(User::class, 'reply_user_id');
    }

    /**
     * 回复用户
     * @return BelongsTo
     */
    public function reply_user()
    {
        return $this->belongsTo(User::class, 'reply_user_id');
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
