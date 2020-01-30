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
     * 更新所有模块权限
     * @param Site $site
     * @return bool
     */
    public function updateAllModulePermission(Site $site): bool
    {
        foreach (\Module::all() as $module) {
            $this->updateModulePermission($module, $site);
        }
        return true;
    }

    /**
     * 更新模块权限
     * @param $module
     * @param Site $site
     * @return bool
     */
    protected function updateModulePermission($module, Site $site): bool
    {
        $permissions = include("{$module->path}/Config/permissions.php");
        foreach ($permissions as $permission) {
            P::create([
                'name' => $permission['name'],
                'title' => $permission['title'],
                'site_id' => $site['id'],
                'module' => $module['name'],
                'guard_name' => 'web'
            ]);
        }
        return true;
    }
}
