<?php

namespace App\Services;

use App\Models\Site;

class MenuService
{
    public function getSiteSystemMenus(Site $site)
    {
        $menus  = config('menus');
        foreach ($menus as $k => $item) {
            $item['permission'] = "s{$site['id']}-{$item['permission']}";
            $menus[$k] = $item;
        }
        return $menus;
    }

    //当前路由是否在模块菜单组中
    public function isMenuGroup($menu)
    {
        return (bool) collect($menu['items'])->filter(function ($menu) {
            return isset($menu['route']) &&  if_route($menu['route']);
        })->count();
    }
}
