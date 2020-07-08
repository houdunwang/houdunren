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

            $module = $this->addModulePermissionPrefix($site, $module);

            collect($module['menus'])->map(function ($menu) use ($module) {
                foreach ($menu['items'] as $item) {
                    Permission::updateOrCreate(
                        ['name' => $item['permission']],
                        ['name' => $item['permission'], 'title' => $item['title'], 'module_id' => $module['id']]
                    );
                }
            });
        });
    }

    //同步系统权限
    public function saveSiteSystemPermissions(Site $site)
    {
        $menus = app(MenuService::class)->getSiteSystemMenus($site);

        foreach ($menus as $item) {
            Permission::updateOrCreate(
                ['name' => $item['permission']],
                ['name' => $item['permission'], 'title' => $item['title']]
            );
        }
    }

    public function addModulePermissionPrefix(Site $site, array $module)
    {
        foreach ($module['menus'] as $n => $menu) {
            foreach ($menu['items'] as $k => $item) {
                $module['menus'][$n]['items'][$k]['permission'] =
                    "s{$site['id']}-{$module['name']}-{$item['permission']}";
            }
        }
        return $module;
    }

    public function checkModuleMenuPermission(array $menu)
    {
        return (bool) array_filter($menu['items'], function ($m) {
            return user()->can($m['permission']);
        });
    }

    public function checkModulePermission($module)
    {
        return (bool) collect($module['menus'])->filter(function ($menu) {
            return collect($menu['items'])->filter(function ($item) {
                return user()->can($item['permission']);
            })->count();
        })->count();
    }
}
