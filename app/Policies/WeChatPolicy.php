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
use App\Models\Chat;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChatPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Chat $Chat)
    {
    }

    public function create(User $user)
    {
        return is_super_admin() || site()['admin']['id'] == $user['id'];
    }

    public function update(User $user, Chat $Chat)
    {
    }

    public function delete(User $user, Chat $Chat)
    {
    }

    public function restore(User $user, Chat $Chat)
    {
    }

    public function forceDelete(User $user, Chat $Chat)
    {
    }
}
