<?php

namespace App\Services;

use App\Models\Site;
use Spatie\Permission\Models\Permission;

/**
 * 权限管理服务
 * @package App\Services
 */
class PermissionService
{
  /**
   * 储存站点模块权限配置
   * @param Site $site
   * @return void
   */
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

  /**
   * 验证菜单块是否显示
   * @param Site $site
   * @param mixed $module
   * @param array $menu
   * @return bool
   */
  public function checkModuleMenuPermission(Site $site, $module, array $menu)
  {
    return (bool) array_filter($menu['items'], function ($item) use ($site, $module) {
      return access($item['permission'], $site, $module) && (isset($item['show']) ? $item['show'] : true);
    });
  }

  /**
   * 验证是站点模块的权限
   * @param Site $site
   * @param mixed $module
   * @return bool
   */
  public function checkModulePermission(Site $site, $module)
  {
    return (bool) collect($module['menus'])->filter(function ($menu) use ($site, $module) {
      return collect($menu['items'])->filter(function ($item) use ($site, $module) {
        return access($item['permission'], $site, $module);
      })->count();
    })->count();
  }
}
