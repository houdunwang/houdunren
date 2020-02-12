<?php

namespace App\Servers;

use App\Models\Site;
use App\User;
use Spatie\Permission\Models\Permission as P;

/**
 * 权限服务
 * Class Access
 * @package App\Servers
 */
class Access
{
    /**
     * 更新所有站点权限
     */
    public function updateAllSitePermission(): void
    {
        foreach (Site::all() as $site)
            $this->updateSitePermission($site);
    }

    /**
     * 更新所有模块权限
     * @param Site $site
     */
    public function updateSitePermission(Site $site): void
    {
        foreach (\Module::all() as $module)
            $this->addModulePermission($module, $site);

        app()['cache']->forget('spatie.permission.cache');
    }

    /**
     * 更新模块权限
     * @param $module
     * @param Site $site
     */
    protected function addModulePermission($module, Site $site): void
    {
        $site->permissions()->delete();
        $permissions = include("{$module->getPath()}/config/permissions.php");
        foreach ($permissions as $permission) {
            P::create([
                'name' => "S{$site['id']}-" . $permission['name'],
                'title' => $permission['title'],
                'site_id' => $site['id'],
                'module' => $module->getName(),
                'guard_name' => 'web'
            ]);
        }
    }

    /**
     * 超级管理员
     * @param User $user
     * @return bool
     */
    public function isSuperAdmin(User $user): bool
    {
        return $user['id'] === 1;
    }

    /**
     * 站长
     * @param Site $site
     * @param User $user
     * @return bool
     */
    public function isAdmin(Site $site, User $user): bool
    {
        $siteUser = $site->user()->byUser($user);
        return $siteUser && $siteUser['role'] === 'admin';
    }

    /**
     * 站点操作员
     * @param Site $site
     * @param User $user
     * @return bool
     */
    public function isOperator(Site $site, User $user): bool
    {
        $siteUser = $site->user()->byUser($user);
        return $siteUser && $siteUser['role'] === 'operator';
    }

    /**
     * 站点普通用户
     * @param Site $site
     * @param User $user
     * @return bool
     */
    public function isUser(Site $site, User $user): bool
    {
        $siteUser = $site->user()->byUser($user);
        return $siteUser && $siteUser['role'] === 'user';
    }
}
