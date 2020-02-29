<?php

namespace App\Servers;

use App\Models\Site;
use App\User;
use Spatie\Permission\Models\Permission;

/**
 * 站点模块权限服务
 * Class Access
 * @package App\Servers
 */
class AccessServer
{
  /**
   * 检测当前用户模块访问权限
   * @param string $permission 权限标识
   * @return bool
   */
  public function check(string $permission, ?Site $site, ?User $user): bool
  {
    $user = $user ?? auth()->user();
    $site = $site ?? site();
    return app(UserServer::class)->isRole($site, $user, ['admin'])
      || isSuperAdmin() || $user->can($permission);
  }

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
    $this->removeInvalidPermission($site);
    $this->saveSitePermission($site);
  }

  /**
   * 移除无效的站点权限
   * @param Site $site
   *
   * @return mixed
   */
  protected function removeInvalidPermission(Site $site)
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
  protected function saveSitePermission(Site $site)
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
   * 格式化模块权限数据
   * @param mixed $site
   *
   * @return array
   */
  protected function format($site)
  {
    $format = [];
    $modules = app(ModuleServer::class)->getSiteModule($site);
    foreach ($modules as $module) {
      foreach ($module['menu']['admin'] as $category) {
        foreach ($category['menus'] as $menu) {
          foreach ($menu['items'] as $item) {
            $format[$module['model']['id']][] = [
              'title' => $item['title'],
              'permission' => $item['permission']
            ];
          }
        }
      }
    }

    return $format;
  }

  /**
   * 获取用户权限名称
   * @param mixed $site
   * @param mixed $user
   *
   * @return void
   */
  public function getUserPermissionNames($site, $user)
  {
    return $user->permissions->where('site_id', $site['id'])->map(function ($permission) {
      return $permission->name;
    });
  }
}
