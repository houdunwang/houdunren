<?php

namespace App\Services\Permission;

use App\Models\Site;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Collection;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use UserService;
use ModuleService;
use App\Models\Module;

/**
 * 权限管理服务
 * @package App\Services
 */
class PermissionService
{
    /**
     * 权限验证
     *
     * @param Site $site
     * @param Module $module
     * @param User $user
     * @param string $permission
     * @return boolean
     */
    public function access(Site $site, Module $module, User $user, string $permission): bool
    {
        if (!$user || !$site || !$module) {
            return false;
        }
        if (UserService::isSuperAdmin($user) || UserService::isMaster($user, $site)) {
            return true;
        }
        return $user->can($this->permissionName($site, $module, $permission));
    }

    /**
     * 更新站点权限
     * @param Site $site
     * @return void
     */
    public function saveSiteModulePermissions(Site $site)
    {
        $this->sitePermissions($site)->each(function ($permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                ['name' => $permission['permission_name']] + $permission
            );
        });
    }

    /**
     * 删除站点无效的权限
     *
     * @param Site $site
     * @return void
     */
    public function delInvalidSitePermissions(Site $site)
    {
        $names = $this->sitePermissions($site)->map(fn ($p) => $p['name']);
        Permission::where('site_id', $site['id'])->whereNotIn('name', $names)->delete();
    }

    /**
     * 站点权限列表
     *
     * @param Site $site
     * @return Collection
     */
    public function sitePermissions(Site $site): Collection
    {
        return $site->modules->reduce(function ($collect, $module) {
            $permissions = ModuleService::config($module['name'], 'permissions');
            foreach ($permissions as $permission) {
                $collect->push(...$permission['rules']);
            }
            return $collect;
        }, collect());
    }

    /**
     * 权限完成标识
     *
     * @param Site $site
     * @param Module $module
     * @return array
     */
    // public function formatModulePermission(Site $site, Module $module): array
    // {
    //     $moduleData = ModuleService::find($module['name']);
    //     $moduleData['permissions'] = collect($moduleData['permissions'])->map(function ($permission) use ($site, $module) {
    //         $permission['rules'] = collect($permission['rules'])->map(function ($rule) use ($site, $module) {
    //             return  [
    //                 'permission_name' => $this->permissionName($site, $module, $rule['name']),
    //                 'module_id' => $module['id'],
    //                 'site_id' => $site['id']
    //             ] + $rule;
    //         });
    //         return $permission;
    //     });
    //     return $moduleData['permissions'];
    // }

    /**
     * 完整权限标识
     *
     * @param Site $site
     * @param Module $module
     * @param string $name
     * @return string
     */
    public function permissionName(Site $site, Module $module, string $name): string
    {
        return "s{$site->id}-{$module['name']}-{$name}";
    }

    /**
     * 用户是否可使用模块
     *
     * @param Site $site
     * @param Module $module
     * @param User $user
     * @return boolean
     */
    public function checkModule(Site $site, Module $module, User $user): bool
    {
        $permissions = ModuleService::config($module['name'], 'permissions');
        return (bool)collect($permissions)->filter(function ($permisssion) use ($site, $module, $user) {
            return collect($permisssion['rules'])->filter(function ($rule) use ($site, $module, $user) {
                return $this->access($site, $module, $user, $rule['name']);
            })->count();
        })->count();
    }
}
