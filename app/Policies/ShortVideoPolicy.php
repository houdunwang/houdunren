<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\ShortVideo;

class ShortVideoPolicy
{
    use HandlesAuthorization;

    public function before()
    {
        return isAdministrator();
    }

    public function view(User $user, ShortVideo $shortVideo)
    {
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShortVideo  $shortVideo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ShortVideo $shortVideo)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShortVideo  $shortVideo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ShortVideo $shortVideo)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShortVideo  $shortVideo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ShortVideo $shortVideo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShortVideo  $shortVideo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ShortVideo $shortVideo)
    {
        //
    }
}
