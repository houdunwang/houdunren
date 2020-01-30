<?php

namespace App\Servers;

use App\Models\Site;
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
        foreach (Site::all() as $site) {
            $this->updateSitePermission($site);
        }
    }

    /**
     * 更新所有模块权限
     * @param Site $site
     */
    public function updateSitePermission(Site $site): void
    {
        $site->permissions()->delete();
        foreach (\Module::all() as $module) {
            $this->addModulePermission($module, $site);
        }
        app()['cache']->forget('spatie.permission.cache');
    }

    /**
     * 更新模块权限
     * @param $module
     * @param Site $site
     */
    protected function addModulePermission($module, Site $site): void
    {
        $permissions = include("{$module->getPath()}/Config/permissions.php");
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
}
