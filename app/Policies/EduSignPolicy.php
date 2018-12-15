<?php

namespace App\Policies;

use App\User;
use App\Models\EduSign;
use Illuminate\Auth\Access\HandlesAuthorization;

class EduSignPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the edu sign.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduSign  $eduSign
     * @return mixed
     */
    public function view(User $user, EduSign $eduSign)
    {
        //
    }

    /**
     * Determine whether the user can create edu signs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the edu sign.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduSign  $eduSign
     * @return mixed
     */
    public function update(User $user, EduSign $eduSign)
    {
        //
    }

    /**
     * Determine whether the user can delete the edu sign.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduSign  $eduSign
     * @return mixed
     */
    public function delete(User $user, EduSign $sign)
    {
        return $user->can('Edu-sign');
    }

    /**
     * Determine whether the user can restore the edu sign.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduSign  $eduSign
     * @return mixed
     */
    public function restore(User $user, EduSign $eduSign)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the edu sign.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduSign  $eduSign
     * @return mixed
     */
    public function forceDelete(User $user, EduSign $eduSign)
    {
        //
    }
}
