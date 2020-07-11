<?php

namespace App\Policies;

use App\Models\Site;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SitePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Site  $site
     * @return mixed
     */
    public function view(User $user, Site $site)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Site $site)
    {
        return $user['id'] == $site['user_id'];
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Site  $site
     * @return mixed
     */
    public function delete(User $user, Site $site)
    {
        return $user['id'] == $site['user_id'];
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Site  $site
     * @return mixed
     */
    public function restore(User $user, Site $site)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Site  $site
     * @return mixed
     */
    public function forceDelete(User $user, Site $site)
    {
        //
    }
}
