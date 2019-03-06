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
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return isSuperAdmin();
    }

    public function view(User $user, User $model)
    {
    }

    public function create(User $user)
    {
        return isSuperAdmin();
    }

    public function update(User $user, User $model)
    {
        return $user['id'] == $model['id'] || isSuperAdmin();
    }

    public function lock(User $user, User $model)
    {
        return $model['id'] > 1 && isSuperAdmin();
    }

    public function delete(User $user, User $model)
    {
        return $model['id'] > 1 && isSuperAdmin();
    }

    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User $user
     * @param  \App\App\User $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
