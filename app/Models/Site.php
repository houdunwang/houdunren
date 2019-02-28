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

    /**
     * 公众号关联
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chat()
    {
        return $this->hasMany(Chat::class, 'site_id');
    }

    /**
     * 站点所有套餐
     * @return mixed
     */
    public function packages()
    {
        return $this->user()->wherePivot('role', 'admin')->first()->group->package();
    }

    /**
     * 模块集合
     * @return \Illuminate\Support\Collection
     */
    public function getModulesAttribute()
    {
        $modules = collect();
        foreach ($this->packages as $package) {
            $modules = $modules->merge($package->module);
        }
        return $modules;
    }

    /**
     * 模板集合
     * @return \Illuminate\Support\Collection
     */
    public function getTemplatesAttribute()
    {
        $templates = collect();
        foreach ($this->packages as $package) {
            $templates = $templates->merge($package->template);
        }
        return $templates;
    }
}
