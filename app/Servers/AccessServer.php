<?php

namespace App\Servers;

use App\Models\Module;
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
   * 获取站点权限列表
   * @param Site $site
   *
   * @return array
   */
  // public function getSiteAccess(Site $site)
  // {
  //   $permissions = Permission::where('site_id', $site['id'])->get();

  //   return $permissions->map(function ($p) {
  //     $p['module_name'] = Module::find($p['module_id'])['title'];
  //     return $p;
  //   })->groupBy('module_name');
  // }

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
   * 更新所有模块权限
   * @param Site $site
   *
   * @return void
   */
  public function updateSitePermission(Site $site)
  {
    $modules = app(ModuleServer::class)->getSiteModule($site);
    foreach ($modules as $module) {
      $this->removeInvalidModulePermission($module, $site);
      $this->addModulePermissionToSite($site, $module);
    }

    app()['cache']->forget('spatie.permission.cache');
  }

  /**
   * 移除无效的模块权限
   * @param array $module
   * @param Site $site
   *
   * @return mixed
   */
  protected function removeInvalidModulePermission($module, Site $site)
  {
    $permissions = $site->permissions()->where('module_id', $module['model']['id'])->get();
    //模块所有拥有权限的菜单
    $original = app(MenuServer::class)->getHasPermissionMenus($site);
    $permissions->map(function ($permission) use ($original) {
      foreach ($original as $permissions) {
        foreach ($permissions as $p) {
          if ($permission['name'] ===  $p['permission'])
            return true;
        }
      }
      $permission->delete();
    });
  }

  /**
   * 设置模块在网站的权限
   * @param array $module
   * @param Site $site
   *
   * @return void
   */
  protected function addModulePermissionToSite(Site $site, array $module)
  {
    //模块所有拥有权限的菜单
    $original = app(MenuServer::class)->getHasPermissionMenus($site);
    foreach ($original as $permissions) {
      foreach ($permissions as $p) {
        //如果权限标识已经存在时不添加
        $hasPermission = $site->permissions()->where('name', $p['permission'])->first();
        if (!$hasPermission)
          Permission::create([
            'name' =>  $p['permission'],
            'title' => $p['title'],
            'site_id' => $site['id'],
            'module_id' => $module['model']['id'],
            'guard_name' => 'web'
          ]);
      }
    }
  }
}
