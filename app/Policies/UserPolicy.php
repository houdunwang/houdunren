<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function follow(User $user, User $model)
    {
        return $user['id'] != $model['id'];
    }

    //资料修改
    public function show(User $user, User $model)
    {
        return $user['id'] == $model['id'];
    }

    public function create(User $user)
    {
    }

    public function update(User $user, User $model)
    {
        return $user['id'] == $model['id'];
    }

    public function delete(User $user, User $model)
    {
    }

    public function restore(User $user, User $model)
    {
    }

    public function forceDelete(User $user, User $model)
    {
    }
}
