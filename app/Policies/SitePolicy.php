<?php

namespace App\Policies;

use App\Models\Site;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use UserService;

/**
 * 站点策略
 * @package App\Policies
 */
class SitePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Site $site)
    {
        return UserService::isMaster($site, $user);
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Site $site)
    {
        return UserService::isMaster($site, $user);
    }

    public function delete(User $user, Site $site)
    {
        return UserService::isMaster($site, $user);
    }
}
