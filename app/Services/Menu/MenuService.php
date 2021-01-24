<?php

namespace App\Services\Menu;

use Illuminate\Support\Collection;
use PermissionService;

/**
 * 菜单服务
 * @package App\Services
 */
class MenuService
{
    /**
     * 获取当前用户的菜单项
     *
     * @return Collection
     */
    public function currentUserMenus(): Collection
    {
        $menus = module()['menus'];
        foreach ($menus as $k => $menu) {
            $menus[$k]['items'] = collect($menu['items'])->filter(function ($item) {
                return PermissionService::access($item['permission']);
            })->toArray();
        }
        return collect($menus)->filter(fn ($menu) => count($menu['items']));
    }
}
