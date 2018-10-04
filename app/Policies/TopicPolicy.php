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

    /**
     * Determine whether the user can create topics.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the topic.
     *
     * @param  \App\User $user
     * @param  \App\Models\Topic $topic
     * @return mixed
     */
    public function update(User $user, Topic $topic)
    {
        //
    }

    /**
     * Determine whether the user can delete the topic.
     *
     * @param  \App\User $user
     * @param  \App\Models\Topic $topic
     * @return mixed
     */
    public function delete(User $user, Topic $topic)
    {
        //
    }

    /**
     * Determine whether the user can restore the topic.
     *
     * @param  \App\User $user
     * @param  \App\Models\Topic $topic
     * @return mixed
     */
    public function restore(User $user, Topic $topic)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the topic.
     *
     * @param  \App\User $user
     * @param  \App\Models\Topic $topic
     * @return mixed
     */
    public function forceDelete(User $user, Topic $topic)
    {
        //
    }
}
