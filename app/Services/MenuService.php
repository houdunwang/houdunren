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
}
