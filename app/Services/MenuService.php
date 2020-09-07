<?php

namespace App\Services;

use App\Models\Site;

class MenuService
{
    public function getSiteSystemMenus(Site $site)
    {
        $menus = config('menus');
        foreach ($menus as $k => $item) {
            $item['permission'] = "s{$site['id']}-{$item['permission']}";
            $menus[$k] = $item;
        }
        return $menus;
    }

    public function currentActiveMenu($menu)
    {
        session(['module_menu' => $menu]);
    }

    public function currentActiveMenuRoute($module)
    {
        $group = session('module_menu.0');
        $item = session('module_menu.1');

        return $module['menus'][$group]['items'][$item]['route'];
    }

    public function isCurrentMenuGroup($index)
    {
        return $index == session('module_menu.0');
    }
}
