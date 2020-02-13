<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

/**
 * 站点管理
 * Class Site
 * @package App\Models
 */
class Site extends Model
{
    protected $fillable = ['name', 'keyword', 'description', 'logo', 'icp', 'tel', 'email', 'counter','domain'];

    protected $casts = [
        'config' => 'array'
    ];

    /**
     * 公众号关联
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function weChat(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WeChat::class);
    }

    /**
     * 站点所有权限
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Permission::class);
    }

    public function siteUser()
    {
        return $this->hasMany(SiteUser::class);
    }

    /**
     * 站点用户关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'site_users')
            ->withTimestamps()
            ->withPivot('role')->as('role');
    }

    /**
     * 获取管理员与操作员
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function manage(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->user()
            ->wherePivotIn('role', ['admin', 'operator'])->get();
    }

    /**
     * 是否是操作员或管理员
     * @param User $user
     * @return bool
     */
    public function isManage(User $user): bool
    {
        return $this->manage()->contains($user);
    }

    /**
     * 获取站长
     * @return mixed
     */
    public function admin()
    {
        return $this->user()->wherePivot('role', 'admin')->first();
    }
}
