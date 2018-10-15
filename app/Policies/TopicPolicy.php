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
use App\Models\Topic;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Topic $topic)
    {
        return $topic['status'] == 1 || $user['id'] == $topic['user_id'];
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Topic $topic)
    {
    }

    public function delete(User $user, Topic $topic)
    {
    }

    public function restore(User $user, Topic $topic)
    {
    }

    public function forceDelete(User $user, Topic $topic)
    {
    }
}
