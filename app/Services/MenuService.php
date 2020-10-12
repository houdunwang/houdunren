<?php

namespace App\Services;

use App\Models\Site;
use Illuminate\Contracts\Container\BindingResolutionException;
use LogicException;

/**
 * 菜单管理服务
 * @package App\Services
 */
class MenuService
{
  /**
   * 获取站点系统菜单
   * @param Site $site
   * @return mixed
   * @throws BindingResolutionException
   * @throws LogicException
   */
  // public function getSiteSystemMenus(Site $site)
  // {
  //   $menus = config('menus');
  //   foreach ($menus as $k => $item) {
  //     $item['permission'] = "s{$site['id']}-{$item['permission']}";
  //     $menus[$k] = $item;
  //   }
  //   return $menus;
  // }

  /**
   * 缓存当前菜单
   * @param mixed $menu
   * @return void
   * @throws BindingResolutionException
   */
  public function currentActiveMenu($menu)
  {
    session(['module_menu' => $menu]);
  }

  /**
   * 当前操作菜单
   * @param mixed $module
   * @return mixed
   * @throws BindingResolutionException
   */
  public function currentActiveMenuRoute($module)
  {
    $group = session('module_menu.0');
    $item = session('module_menu.1');

    return $module['menus'][$group]['items'][$item]['url'];
  }

  /**
   * 当前菜单块
   * @param mixed $index
   * @return bool
   * @throws BindingResolutionException
   */
  public function isCurrentMenuGroup($index)
  {
    return $index == session('module_menu.0');
  }
}
