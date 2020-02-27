<?php

namespace App\Servers;

use App\Models\Site;
use App\User;

class UserServer
{
    /**
     * 判断用户是否为站点的指定角色
     * @param Site $site
     * @param User $user
     * 
     * @return bool
     */
    public function isRole(Site $site, User $user, array $role = [])
    {
        $role = $role ? $role : ['admin', 'operator'];
        return $user->site()->wherePivotIn('role', $role)
            ->where('site_id', $site['id'])->first() ? true : false;
    }
}
