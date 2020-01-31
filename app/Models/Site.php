<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

/**
 * 站点管理
 * Class Site
 * @package App\Models
 */
class Site extends Model
{
    protected $guarded = [];

    public function weChat()
    {
        return $this->hasMany(WeChat::class);
    }

    public function permissions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Permission::class);
    }

    public function user()
    {
        return $this->hasMany(SiteUser::class);
    }

    /**
     * 站点管理员
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function admin(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->user()->where('role', 'admin');
    }
}
