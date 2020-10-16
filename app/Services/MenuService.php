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
  public function currentActiveMenu(string $type, array $menu)
  {
    session(['module_menu' => ['type' => $type, 'menu' => $menu]]);
  }

  /**
   * 当前操作菜单
   * @param mixed $module
   * @return mixed
   * @throws BindingResolutionException
   */
  public function currentActiveMenuRoute($module)
  {
    $group = session('module_menu.menu.0');
    $item = session('module_menu.menu.1');

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

  /**
   * 验证菜单块是否显示
   * @param Site $site
   * @param mixed $module
   * @param array $menu
   * @return bool
   */
  public function showMenuGroup(Site $site, $module, array $menu): bool
  {
    if (session('module_menu.type') != ($menu['type'] ?? 'module')) return false;
    return (bool) array_filter($menu['items'], function ($item) use ($site, $module) {
      return access($item['permission'], $site, $module) && (isset($item['show']) ? $item['show'] : true);
    });
  }
}
