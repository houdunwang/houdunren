<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ModuleService;
use PermissionService;
use SiteService;

/**
 * 系统模块
 * @package App\Models
 */
class Module extends Model
{
    protected $fillable = ['title', 'name', 'version', 'description', 'author'];

    protected $appends = ['preview', 'config', 'menus'];

    /**
     * 模块菜单
     * @return void
     */
    public function getMenusAttribute()
    {
        return ModuleService::config($this->name, 'menus');
    }

    /**
     * 模块初始配置
     * @return void
     */
    public function getConfigAttribute()
    {
        return ModuleService::config($this->name, 'config');
    }



    /**
     * 预览图
     * @return void
     */
    public function getPreviewAttribute()
    {
        return url("modules/{$this->name}/static/preview.jpeg");
    }

    public function getGroupsAttribute()
    {
        return $this->packages()->with('groups')->get()->mapWithKeys(fn ($p) => $p['groups'])->unique('id');
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}
