<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Policies;

use App\User;
use App\Models\Site;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy
{
    use HandlesAuthorization;

    public function before($user, $action)
    {
        return is_super_admin() ? true : null;
    }

    /**
     * 站点管理权限
     * @param User $user
     * @param Site $site
     * @return bool
     */
    public function admin(User $user, Site $site)
    {
        return $site['admin']['id'] == $user['id'] || is_super_admin();
    }

    public function view(User $user, Site $site)
    {
        return $site->isManage($user);
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Site $site)
    {
        return ($site['admin']['id'] == $user['id']) || is_super_admin();
    }

    public function delete(User $user, Site $site)
    {
        return ($site['admin']['id'] == $user['id']) || is_super_admin();
    }

    /**
     * Determine whether the user can restore the site.
     *
     * @param  \App\User $user
     * @param  \App\Models\Site $site
     * @return mixed
     */
    public function restore(User $user, Site $site)
    {
    }

    /**
     * Determine whether the user can permanently delete the site.
     *
     * @param  \App\User $user
     * @param  \App\Models\Site $site
     * @return mixed
     */
    public function forceDelete(User $user, Site $site)
    {
        //
    }
}
