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
use App\Models\Lesson;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the lesson.
     *
     * @param  \App\User $user
     * @param  \App\Models\Lesson $lesson
     * @return mixed
     */
    public function view(User $user, Lesson $lesson)
    {
        //
    }

    /**
     * Determine whether the user can create lessons.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the lesson.
     *
     * @param  \App\User $user
     * @param  \App\Models\Lesson $lesson
     * @return mixed
     */
    public function update(User $user, Lesson $lesson)
    {
        return $user['id'] == $lesson['user_id'];
    }

    /**
     * Determine whether the user can delete the lesson.
     *
     * @param  \App\User $user
     * @param  \App\Models\Lesson $lesson
     * @return mixed
     */
    public function delete(User $user, Lesson $lesson)
    {
        return $user['id'] == $lesson['user_id'];
    }

    /**
     * Determine whether the user can restore the lesson.
     *
     * @param  \App\User $user
     * @param  \App\Models\Lesson $lesson
     * @return mixed
     */
    public function restore(User $user, Lesson $lesson)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the lesson.
     *
     * @param  \App\User $user
     * @param  \App\Models\Lesson $lesson
     * @return mixed
     */
    public function forceDelete(User $user, Lesson $lesson)
    {
        //
    }
}
