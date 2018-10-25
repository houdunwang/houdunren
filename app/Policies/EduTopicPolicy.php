<?php

namespace App\Policies;

use App\User;
use App\Models\EduTopic;
use Illuminate\Auth\Access\HandlesAuthorization;

class EduTopicPolicy
{
    use HandlesAuthorization;

    public function view(User $user, EduTopic $topic)
    {
        return $topic['status'] == 1 || $user['id'] == $topic['user_id'];
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

    public function update(User $user, EduTopic $topic)
    {
        return $user['id'] == $topic['user_id'] || $user->can('Edu-topic-destroy');
    }

    public function delete(User $user, EduTopic $topic)
    {
        return $user['id'] == $topic['user_id'] || $user->can('Edu-topic-destroy');
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
