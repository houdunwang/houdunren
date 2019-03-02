<?php

namespace App\Policies;

use App\User;
use App\Models\Group;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    public function before($user, $model)
    {
        return isSuperAdmin() ? true : null;
    }

    public function view(User $user, Group $group)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Group $group)
    {
    }

    public function delete(User $user, Group $group)
    {
        return !$group['system'];
    }

    /**
     * Determine whether the user can restore the group.
     *
     * @param  \App\User $user
     * @param  \App\Models\Group $group
     * @return mixed
     */
    public function restore(User $user, Group $group)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the group.
     *
     * @param  \App\User $user
     * @param  \App\Models\Group $group
     * @return mixed
     */
    public function forceDelete(User $user, Group $group)
    {

    }
}
