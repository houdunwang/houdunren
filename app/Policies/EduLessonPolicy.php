<?php

namespace App\Policies;

use App\Models\EduOrder;
use App\Models\EduSubscribe;
use App\User;
use App\Models\EduLesson;
use Illuminate\Auth\Access\HandlesAuthorization;

class EduLessonPolicy
{
    use HandlesAuthorization;

    /**
     * 视频观看
     * @param User $user
     * @param EduLesson $lesson
     * @return bool
     */
    public function view(User $user, EduLesson $lesson)
    {return true;
        return $lesson['free']
            || app(EduOrder::class)->isBuy($lesson, $user)
            || app(EduSubscribe::class)->subscribe($user);
    }

    /**
     * Determine whether the user can create edu lessons.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the edu lesson.
     *
     * @param  \App\User $user
     * @param  \App\Models\EduLesson $lesson
     * @return mixed
     */
    public function update(User $user, EduLesson $lesson)
    {
        return $user['id'] == $lesson['user_id'] || $user->can('Edu-lesson');
    }

    /**
     * Determine whether the user can delete the edu lesson.
     *
     * @param  \App\User $user
     * @param  \App\Models\EduLesson $lesson
     * @return mixed
     */
    public function delete(User $user, EduLesson $lesson)
    {
        //
    }

    /**
     * Determine whether the user can restore the edu lesson.
     *
     * @param  \App\User $user
     * @param  \App\Models\EduLesson $lesson
     * @return mixed
     */
    public function restore(User $user, EduLesson $lesson)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the edu lesson.
     *
     * @param  \App\User $user
     * @param  \App\Models\EduLesson $lesson
     * @return mixed
     */
    public function forceDelete(User $user, EduLesson $lesson)
    {
        //
    }
}
