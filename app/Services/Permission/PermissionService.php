<?php

namespace App\Services\Permission;

use App\Models\Site;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Collection;
use App\Models\Module;
use App\Models\User;
use ModuleService;
use UserService;

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
        if (UserService::isSuperAdmin($user) || UserService::isMaster($user, $site)) {
            return true;
        }
        return $user->can($this->permissionName($site, $module, $permission));
    }

    /**
     * 同步站点权限到权限表
     * @param Site $site
     * @return void
     */
    public function syncSitePermissions(Site $site)
    {
        $this->sitePermissions($site)->each(function ($permission) use ($site) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                ['site_id' => $site->id] + $permission
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
            foreach ($module['permissions'] as $permission) {
                $collect->push(...$permission['rules']);
            }
            return $collect;
        }, collect());
    }

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
    public function checkUserModuleAccess(Site $site, Module $module, User $user): bool
    {
        $permissions = ModuleService::config($module['name'], 'permissions');
        return (bool)collect($permissions)->filter(function ($permisssion) use ($site, $module, $user) {
            return collect($permisssion['rules'])->filter(function ($rule) use ($site, $module, $user) {
                return $this->access($site, $module, $user, $rule['name']);
            })->count();
        })->count();
    }
}
