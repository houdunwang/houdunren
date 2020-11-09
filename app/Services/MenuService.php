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
  protected $system = ['article', 'wechat'];

  /**
   * 缓存当前菜单
   * @param mixed $menu
   * @return void
   * @throws BindingResolutionException
   */
  public function currentActiveMenu(string $tag, array $path)
  {
    session(['menu' => ['tag' => $tag, 'group' => $path[0], 'menu' => $path[1]]]);
  }

  /**
   * 当前操作菜单
   * @param mixed $module 模块数据
   * @return mixed
   * @throws BindingResolutionException
   */
  public function currentActiveMenuRoute(string $tag)
  {
    $menus = in_array($tag, $this->system) ? $this->system($tag) : $this->module($tag);

    return $menus[session('menu.group')]['items'][session('menu.menu')]['url'];
  }

  /**
   * 是否为当前菜单组
   * @param mixed $index 菜单组编号
   * @return bool
   * @throws BindingResolutionException
   */
  public function isCurrentMenuGroup($tag, $index)
  {
    return session('menu.tag') == $tag && $index == session('menu.group');
  }

  /**
   * 验证菜单组是否可用
   * @param Site $site
   * @param mixed $module
   * @param array $menu
   * @return bool
   */
  public function checkMenuGroup(Site $site, $module, array $menu): bool
  {
    return (bool) array_filter($menu['items'], function ($item) use ($site, $module) {
      return access($item['permission'], $site, $module) && (isset($item['show']) ? $item['show'] : true);
    });
  }

  /**
   * 模块所有菜单包括系统菜单
   * @param mixed $name
   * @return array
   * @throws BindingResolutionException
   */
  public function allMenus($name)
  {
    $menus = $this->module($name);
    foreach (['article', 'wechat'] as $module) {
      $menus = array_merge($menus, $this->system($module));
    }
    return $menus;
  }

  /**
   * 系统菜单数据
   * @param mixed $name
   * @return array
   */
  public function system($name)
  {
    return [];
    return include __DIR__ . "/menus/{$name}.php";
  }

  /**
   * 模块菜单
   * @param mixed $name
   * @return mixed
   * @throws BindingResolutionException
   */
  public function module($name)
  {
    return include module_path($name) . "/Config/menus.php";
  }
}
