<?php

namespace App\Servers;

use App\Models\Site;
use Spatie\Permission\Models\Permission;

/**
 * 站点模块权限服务
 * Class Access
 * @package App\Servers
 */
class AccessServer
{
  /**
   * 更新所有站点权限
   * @return void
   */
  public function updateAllSitePermission()
  {
    foreach (Site::all() as $site)
      $this->updateSitePermission($site);
  }

  /**
   * 更新站点权限
   * @param Site $site
   *
   * @return void
   */
  public function updateSitePermission(Site $site)
  {
    app()['cache']->forget('spatie.permission.cache');
    $this->removeInvalidModulePermission($site);
    $this->addModulePermissionToSite($site);
  }

  /**
   * 移除无效的站点权限
   * @param Site $site
   *
   * @return mixed
   */
  protected function removeInvalidModulePermission(Site $site)
  {
    $original = [];
    foreach ($this->format($site) as $menus) {
      foreach ($menus as $menu)
        $original[] = $menu['permission'];
    }
    //移除不使用的权限
    foreach ($site->permissions as $permission) {
      if (!in_array($permission['name'], $original)) {
        $permission->delete();
      }
    }
  }

  /**
   * 设置站点权限
   * @param array $module
   * @param Site $site
   *
   * @return void
   */
  protected function addModulePermissionToSite(Site $site)
  {
    foreach ($this->format($site) as $moduleId => $menus) {
      foreach ($menus as $menu) {
        $hasPermission = Permission::where('name', $menu['permission'])->first();
        if (!$hasPermission)
          Permission::create([
            'name' => $menu['permission'],
            'title' => $menu['title'],
            'site_id' => $site['id'],
            'module_id' => $moduleId,
            'guard_name' => 'web'
          ]);
      }
    }
  }
  /**
   * 合并模块菜单
   * @param mixed $site
   *
   * @return array
   */
  protected function format($site)
  {
    $format = [];
    $modules = app(ModuleServer::class)->getSiteModule($site);
    foreach ($modules as $module) {
      foreach ($module['menu']['admin'] as $menus) {
        foreach ($menus as $menu) {
          $format[$module['model']['id']][] = [
            'title' => $menu['title'],
            'permission' => "S{$site['id']}-{$module['config']['name']}-{$menu['permission']}"
          ];
        }
      }
    }

    return $format;
  }
}
