<?php

namespace App\Policies;

use App\User;
use App\Models\EduTopic;
use Illuminate\Auth\Access\HandlesAuthorization;

class EduTopicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the edu topic.
     *
     * @param  \App\User $user
     * @param  \App\Models\EduTopic $eduTopic
     * @return mixed
     */
    public function view(User $user, EduTopic $eduTopic)
    {
        //
    }

    /**
     * Determine whether the user can create edu topics.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the edu topic.
     *
     * @param  \App\User $user
     * @param  \App\Models\EduTopic $eduTopic
     * @return mixed
     */
    public function update(User $user, EduTopic $eduTopic)
    {
        //
    }

    /**
     * Determine whether the user can delete the edu topic.
     *
     * @param  \App\User $user
     * @param  \App\Models\EduTopic $eduTopic
     * @return mixed
     */
    public function delete(User $user, EduTopic $eduTopic)
    {
        return $user['id'] == $eduTopic['user_id'] || $user->can('Edu-topic-destroy');
    }

    /**
     * Determine whether the user can restore the edu topic.
     *
     * @param  \App\User $user
     * @param  \App\Models\EduTopic $eduTopic
     * @return mixed
     */
    public function restore(User $user, EduTopic $eduTopic)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the edu topic.
     *
     * @param  \App\User $user
     * @param  \App\Models\EduTopic $eduTopic
     * @return mixed
     */
    public function forceDelete(User $user, EduTopic $eduTopic)
    {
        //
    }
}
