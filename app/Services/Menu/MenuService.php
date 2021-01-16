<?php

namespace App\Services\Menu;

use App\Models\Site;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * 菜单管理服务
 * @package App\Services
 */
class MenuService
{
    /**
     * 缓存当前菜单
     * @param mixed $menu
     * @return void
     * @throws BindingResolutionException
     */
    public function currentActiveMenu(array $path)
    {
        session(['menu' => ['group' => $path[0], 'menu' => $path[1]]]);
    }

    /**
     * 当前操作菜单
     * @param mixed $module 模块数据
     * @return mixed
     * @throws BindingResolutionException
     */
    public function currentActiveMenuRoute()
    {
        return $this->menus(module()['name'])[session('menu.group')]['items'][session('menu.menu')]['url'];
    }

    /**
     * 是否为当前菜单组
     * @param mixed $index 菜单组编号
     * @return bool
     * @throws BindingResolutionException
     */
    public function isCurrentMenuGroup($index)
    {
        return $index == session('menu.group');
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
     * 当前模块菜单
     * @param mixed $name
     * @return mixed
     * @throws BindingResolutionException
     */
    public function menus(string $name)
    {
        return include module_path($name) . "/Config/menus.php";
    }
}
