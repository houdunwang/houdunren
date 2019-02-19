<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

/**
 * 站点
 * Class Site
 * @package App\Models
 */
class Site extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * 网站操作员
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('role')->as('role')->withTimestamps();
    }

    /**
     * 网站站长
     * @return mixed
     */
    public function getAdminAttribute()
    {
        return $this->user()->wherePivot('role', 'admin')->first();
    }

    /**
     * 站点的所有权限
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
