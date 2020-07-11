<?php

namespace App\Services;

use App\Models\Site;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    public function saveSiteModulePermissions(Site $site)
    {
        $site->master->group->modules->map(function ($model) use ($site) {

            $module = app(ModuleService::class)->find($model['name']);

            collect($module['menus'])->map(function ($menu) use ($module, $site) {
                foreach ($menu['items'] as $item) {
                    $name = permission_name($item['permission'], $site, $module);
                    Permission::updateOrCreate(
                        ['name' => $name],
                        ['name' => $name, 'title' => $item['title'], 'module_id' => $module['id']]
                    );
                }
            });
        });
    }

    public function checkModuleMenuPermission(array $menu)
    {
        return (bool) array_filter($menu['items'], function ($m) {
            return access($m['permission']);
        });
    }

    public function checkModulePermission(Site $site, $module)
    {
        return (bool) collect($module['menus'])->filter(function ($menu) use ($site, $module) {
            return collect($menu['items'])->filter(function ($item) use ($site, $module) {
                return access($item['permission'], $site, $module);
            })->count();
        })->count();
    }
}
