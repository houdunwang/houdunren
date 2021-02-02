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

    protected $appends = ['preview', 'config', 'permissions', 'menus'];

    public function getMenusAttribute()
    {
        return ModuleService::config($this->name, 'menus');
    }

    public function getConfigAttribute()
    {
        return ModuleService::config($this->name, 'config');
    }

    public function getPermissionsAttribute()
    {
        $permissions = ModuleService::config($this->name, 'permissions');
        if ($site = SiteService::cache()) {
            foreach ($permissions as &$permission) {
                foreach ($permission['rules'] as &$rule) {
                    $rule['name'] = PermissionService::permissionName($site, $this, $rule['name']);
                    $rule['module_id'] = $this['id'];
                }
            }
        }
        return $permissions;
    }

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
