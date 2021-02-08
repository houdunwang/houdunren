<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

/**
 * 站点模型
 * @package App\Models
 */
class Site extends Model
{
    protected $fillable = ['title', 'domain', 'config', 'module_id', 'user_id', 'template_id',];

    protected $casts = ['config' => 'array',];
    protected $hidden = ['config'];
    protected $appends = [
        'permissions',
    ];

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

    /**
     * 默认模块
     * @return BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * 站点角色
     *
     * @return void
     */
    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    /**
     * 站长
     * @return BelongsTo
     */
    public function master()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * 管理员
     * @return BelongsToMany
     */
    public function admins()
    {
        return $this->belongsToMany(User::class, 'admin_site');
    }

    /**
     * 用户是否为管理员
     * @param User $user
     * @return mixed
     */
    public function isAdmin(User $user)
    {
        return $this->admins->contains($user);
    }

    /**
     * 公众号关联
     * @return HasMany
     */
    public function wechats()
    {
        return $this->hasMany(WeChat::class, 'site_id');
    }
}
