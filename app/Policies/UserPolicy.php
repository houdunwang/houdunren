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

    //关注
    public function follow(User $user, User $model)
    {
        return $user['id'] != $model['id'];
    }

    //粉丝列表
    public function fans(User $user, User $model)
    {
        return $user['id'] == $model['id'];
    }

    //修改资料
    public function update(User $user, User $model)
    {
        return $user['id'] == $model['id'];
    }
}
