<?php

namespace Modules\Edu\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 签到
 * @package Modules\Edu\Entities
 */
class Sign extends Model
{
    protected $table = 'edu_sign';
    protected $fillable = ['content', 'mood'];
    protected $appends = ['permissions'];

    /**
     * 用户关联
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * 权限
     * @return bool
     * @throws BindingResolutionException
     */
    public function getPermissionsAttribute()
    {
        return [
            'create' => Auth::check() && Auth::user()->can('create', $this),
            'delete' => Auth::check() && Auth::user()->can('delete', $this),
        ];
    }
}
