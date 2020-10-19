<?php

namespace App\Services;

use App\Models\Site;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * 菜单管理服务
 * @package App\Services
 */
class MenuService
{
  /**
   * 模块菜单分类
   * @param string|null $type
   * @return mixed
   * @throws BindingResolutionException
   */
  public function type(string $type = null)
  {
    if ($type) session(['menu.type' => $type]);

    return session('menu.type', 'module');
  }

  /**
   * 缓存当前菜单
   * @param mixed $menu
   * @return void
   * @throws BindingResolutionException
   */
  public function currentActiveMenu(array $menu)
  {
    session(['menu' => ['type' => $this->type(), 'groupIndex' => $menu[0], 'menuIndex' => $menu[1]]]);
  }

  /**
   * 当前操作菜单
   * @param mixed $module
   * @return mixed
   * @throws BindingResolutionException
   */
  public function currentActiveMenuRoute($module)
  {
    $groupIndex = session('menu.groupIndex');
    $menuIndex = session('menu.menuIndex');

    return $module['menus'][$groupIndex]['items'][$menuIndex]['url'];
  }

  /**
   * 当前菜单块
   * @param mixed $index
   * @return bool
   * @throws BindingResolutionException
   */
  public function isCurrentMenuGroup($index)
  {
    return $index == session('menu.groupIndex');
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
    if (session('menu.type', 'module') != ($menu['type'])) return false;
    return (bool) array_filter($menu['items'], function ($item) use ($site, $module) {
      return access($item['permission'], $site, $module) && (isset($item['show']) ? $item['show'] : true);
    });
  }
}
