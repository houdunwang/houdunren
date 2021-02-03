<?php

namespace App\Policies;

use App\Models\Package;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use UserService;

/**
 * 套餐策略
 * @package App\Policies
 */
class PackagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return UserService::isSuperAdmin($user);
    }

    public function view(User $user, Package $package)
    {
        return UserService::isSuperAdmin($user);
    }

    public function create(User $user)
    {
        return UserService::isSuperAdmin($user);
    }

    public function update(User $user, Package $package)
    {
        return UserService::isSuperAdmin($user);
    }

    public function delete(User $user, Package $package)
    {
        return UserService::isSuperAdmin($user);
    }
}
