<?php

namespace App\Policies;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User $user
     * @param  \App\Role $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User $user
     * @param  \App\Role $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User $user
     * @param  \App\Role $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $role['system'] == 0;
    }

    /**
     * Determine whether the user can restore the role.
     *
     * @param  \App\User $user
     * @param  \App\Role $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the role.
     *
     * @param  \App\User $user
     * @param  \App\Role $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
