<?php

namespace App\Services\Menu;

use Illuminate\Support\Collection;
use PermissionService;
use ModuleService;
use App\Models\Module;
use App\Models\Site;
use App\Models\User;

/**
 * 菜单服务
 * @package App\Services
 */
class MenuService
{
    /**
     * 用户后台菜单
     *
     * @param Site $site
     * @param Module $module
     * @param User $user
     * @return Collection
     */
    public function lists(Site $site, Module $module, User $user): Collection
    {
        $menus = ModuleService::config($module['name'], 'menus');
        foreach ($menus as $k => $menu) {
            $menus[$k]['items'] = collect($menu['items'])->filter(function ($item) use ($site, $module, $user) {
                return PermissionService::access($site, $module, $user, $item['permission']);
            })->toArray();
        }
        return collect($menus)->filter(fn ($menu) => count($menu['items']));
    }
}
