<?php

namespace App\Servers;

use App\Models\Module;
use App\Models\Site;
use App\User;

/**
 * 模块菜单服务
 * Class ModuleMenuServer
 */
class MenuServer
{
  /**
   * 根据用户模块菜单
   * @param Module $module
   *
   * @return mixed
   */
  public function getByUser(Site $site, Module $module, User $user)
  {
    $modules =  app(ModuleServer::class)->getModuleByUser($site, $user);
    foreach ($modules as $m => $module) {
      $modules[$m]['menu']['admin'] =
        $this->removeInvalidMenu($site, $module['menu']['admin'], $user);
    }
    return $modules;
  }

  /**
   * 移除无效菜单
   * @param mixed $site
   * @param mixed $menus
   * @param mixed $user
   *
   * @return collection
   */
  protected function removeInvalidMenu($site, $menus, $user)
  {
    foreach ($menus as $m => $menu) {
      $menus[$m]['items'] =
        array_filter($menu['items'], function ($menu) use ($site, $user) {
          return access($menu['permission'], $site, $user);
        });
    }
    return array_filter($menus, function ($menu) {
      return count($menu['items']);
    });
  }
}
