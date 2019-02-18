<?php

namespace App\Policies;

use App\User;
use App\Models\Package;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackagePolicy
{
    use HandlesAuthorization;
    public function before($user, $model)
    {
        return isSuperAdmin() ? true : null;
    }
    public function view(User $user, Package $package)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Package $package)
    {
        //
    }

    /**
     * Determine whether the user can delete the package.
     *
     * @param  \App\User $user
     * @param  \App\Models\Package $package
     * @return mixed
     */
    public function delete(User $user, Package $package)
    {
        return !$package['system'];
    }

    /**
     * Determine whether the user can restore the package.
     *
     * @param  \App\User $user
     * @param  \App\Models\Package $package
     * @return mixed
     */
    public function restore(User $user, Package $package)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the package.
     *
     * @param  \App\User $user
     * @param  \App\Models\Package $package
     * @return mixed
     */
    public function forceDelete(User $user, Package $package)
    {
        //
    }
}
