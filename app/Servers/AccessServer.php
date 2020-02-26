<?php

namespace App\Servers;

use App\Models\Module;
use App\Models\Site;
use App\User;
use Spatie\Permission\Models\Permission;

/**
 * 权限服务
 * Class Access
 * @package App\Servers
 */
class AccessServer
{
  //获取站点权限列表
  public function getSiteAccess(Site $site)
  {
    $permissions = Permission::where('site_id', $site['id'])->get();

    return $permissions->map(function ($p) {
      $p['module_name'] = Module::find($p['module_id'])['title'];
      return $p;
    })->groupBy('module_name');
  }
  /**
   * 更新所有站点权限
   */
  public function updateAllSitePermission()
  {
    foreach (Site::all() as $site)
      $this->updateSitePermission($site);
  }

  /**
   * 更新所有模块权限
   * @param Site $site
   */
  public function updateSitePermission(Site $site)
  {
    foreach (Module::get() as $module) {
      $this->addModulePermissionToSite($module, $site);
    }

    app()['cache']->forget('spatie.permission.cache');
  }

  /**
   * 设置模块在网站的权限
   * @param $module
   * @param Site $site
   */
  protected function addModulePermissionToSite($module, Site $site)
  {
    $moduleConfig = app(ModuleServer::class)->getModuleInfo($module['name']);
    foreach ($moduleConfig['permissions'] as $permission) {
      $name = "S{$site['id']}-" . $permission['name'];
      if (!Permission::where('name', $name)->first()) {
        Permission::create([
          'name' => $name,
          'title' => $permission['title'],
          'site_id' => $site['id'],
          'module_id' => $module['id'],
        ]);
      }
    }
  }
}
