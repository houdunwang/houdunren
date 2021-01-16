<?php

namespace App\Services\Permission;

use App\Models\Site;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Collection;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
     * @param string $permission
     * @param User $user
     * @param Site $site
     * @param array $module
     * @return boolean
     */
    public function access(string $permission, User $user = null, Site $site = null, array $module = null): bool
    {
        $user = $user ?? Auth::user();
        $site = $site ?? site();
        $module = $module ?? module();

        if (!$user || !$site || !$module) {
            return false;
        }
        if (UserService::isSuperAdmin($user) || UserService::isMaster($user, $site)) {
            return true;
        }
        return user()->can($this->permissionName($permission, $site, $module['name']));
    }

    /**
     * 更新站点模块权限数据
     * @param Site $site
     * @return void
     */
    public function saveSiteModulePermissions(Site $site)
    {
        $this->getSitePermissionList($site)->each(function ($permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                ['name' => $permission['permission_name']] + $permission
            );
        });
    }

    /**
     * 删除模块已经不使用的权限信息
     *
     * @param Site $site
     * @return void
     */
    public function delInvalidSitePermission(Site $site)
    {
        $names = $this->getSitePermissionList($site)->map(fn ($p) => $p['name']);
        Permission::where('site_id', $site['id'])->whereNotIn('name', $names);
    }

    /**
     * 获取站点可用的模块权限配置列表
     *
     * @param Site $site
     * @return Collection
     */
    public function getSitePermissionList(Site $site): Collection
    {
        $modules = app(ModuleService::class)->getSiteModules($site);

        return collect($modules)->reduce(function ($collect, $module) use ($site) {
            foreach ($module['permissions'] as $permission) {
                $collect->push(...$permission['rules']);
            }
            return $collect;
        }, collect());
    }

    /**
     * 权限完成标识
     * @param string $permission
     * @param Site $site
     * @param array $module
     * @return string
     */
    public function formatModulePermission(Site $site, array $module)
    {
        $module['permissions'] = collect($module['permissions'])->map(function ($permission) use ($site, $module) {
            $permission['rules'] = collect($permission['rules'])->map(function ($rule) use ($site, $module) {
                return  [
                    'permission_name' => $this->permissionName($rule['name'], $site, $module),
                    'module_id' => $module['id'],
                    'site_id' => $site['id']
                ] + $rule;
            });
            return $permission;
        });
        return $module;
    }

    /**
     * 生成站点权限标识
     *
     * @param Site $site
     * @param array $module
     * @param string $name
     * @return string
     */
    public function permissionName(string $name, Site $site = null, array $module = null): string
    {
        return "s{$site->id}-{$module['name']}-{$name}";
    }

    /**
     * 验证站点模块的权限
     * @param Site $site
     * @param mixed $module
     * @return bool
     */
    public function checkModulePermission(Site $site, $module): bool
    {
        return (bool)collect($module['permissions'])->filter(function ($permisssion) use ($site, $module) {
            return collect($permisssion['rules'])->filter(function ($rule) use ($site, $module) {
                return $this->access($rule['name'], null, $site, $module);
            })->count();
        })->count();
    }
}
