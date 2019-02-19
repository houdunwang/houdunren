<?php

namespace App\Policies;

use App\User;
use App\Models\Site;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy
{
    use HandlesAuthorization;

    public function before($user, $action)
    {
        return isSuperAdmin() ? true : null;
    }

    public function view(User $user, Site $site)
    {
        return $site->user->contains($user) || isSuperAdmin();
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Site $site)
    {
        return ($site['admin']['id'] == $user['id']) || isSuperAdmin();
    }

    public function delete(User $user, Site $site)
    {
        return ($site['admin']['id'] == $user['id']) || isSuperAdmin();
    }

    /**
     * Determine whether the user can restore the site.
     *
     * @param  \App\User $user
     * @param  \App\Models\Site $site
     * @return mixed
     */
    public function restore(User $user, Site $site)
    {
    }

    /**
     * Determine whether the user can permanently delete the site.
     *
     * @param  \App\User $user
     * @param  \App\Models\Site $site
     * @return mixed
     */
    public function forceDelete(User $user, Site $site)
    {
        //
    }
}
