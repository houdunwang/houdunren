<?php

namespace App\Services;

use App\Models\Module;
use App\Models\Site;
use App\User;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * 模块菜单服务
 * Class MenuService
 */
class MenuService
{
    /**
     * 根据用户模块菜单
     * @param Module $module
     *
     * @return mixed
     */
    public function module(Site $site, string $name, User $user)
    {
        $modules = app(ModuleService::class)->getModuleByUser($site, $user);
        foreach ($modules as $k => $m) {
            $modules[$k]['menu']['admin'] =
                $this->removeInvalidMenu($site, $m['menu']['admin'], $user);
        }
        $module =  collect($modules)->first(function ($m) use ($name) {
            return $m['config']['name'] == $name;
        });
        return $module ? $module['menu']['admin'] : [];
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

    /**
     * 获取模块会员中心菜单
     * @param Site $site
     * @return array
     */
    public function member(Site $site, string $name)
    {
        $modules = app(ModuleService::class)->getSiteModule($site);
        $module = collect($modules)->first(function ($m) use ($name) {
            return $m['config']['name'] == $name;
        });
        return $module ? $module['menu']['member'] : [];
    }

    /**
     * 模块个人中心菜单
     * @param Site $site
     * @param string $name
     * @return mixed|array
     * @throws BindingResolutionException
     */
    public function center(Site $site, string $name)
    {
        $modules = app(ModuleService::class)->getSiteModule($site);
        $module = collect($modules)->first(function ($m) use ($name) {
            return $m['config']['name'] == $name;
        });
        return $module ? $module['menu']['center'] : [];
    }
}
