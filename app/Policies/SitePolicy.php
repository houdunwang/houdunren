<?php

namespace App\Policies;
use App\Models\Site;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SitePolicy
{
    use HandlesAuthorization;

    public function before(User $user){
       return $user->isSuperAdmin()?Response::allow():Response::deny('没有操作权限');
    }

    public function viewAny(User $user)
    {
    }

    public function view(User $user, Site $site)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Site $site)
    {
    }

    public function delete(User $user, Site $site)
    {

    }

    /**
     * Determine whether the user can restore the site.
     *
     * @param \App\User $user
     * @param \App\Models\Site $site
     * @return mixed
     */
    public function restore(User $user, Site $site)
    {
    }

    /**
     * Determine whether the user can permanently delete the site.
     *
     * @param \App\User $user
     * @param \App\Models\Site $site
     * @return mixed
     */
    public function forceDelete(User $user, Site $site)
    {
        //
    }
}
