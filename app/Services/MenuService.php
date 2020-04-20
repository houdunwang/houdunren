<?php

namespace App\Services;

use App\Models\Module;
use App\Models\Site;
use App\User;

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
    public function admin(Site $site, Module $module, User $user)
    {
        $modules =  app(ModuleService::class)->getModuleByUser($site, $user);
        foreach ($modules as $k => $m) {
            $modules[$k]['menu']['admin'] =
                $this->removeInvalidMenu($site, $m['menu']['admin'], $user);
        }
        return collect($modules)->first(function ($m) use ($module) {
            return $m['config']['name'] == $module['name'];
        });
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
     * 获取会员中心菜单
     * @param Site $site
     * @return array
     */
    public function member(Site $site)
    {
        $moduleService = new ModuleService;
        return $moduleService->getSiteModule($site);
    }
}
