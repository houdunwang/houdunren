<?php

namespace App\Policies;

use App\Models\Site;
use App\Servers\Access;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SitePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->is_super_admin) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Site $site)
    {
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Site $site)
    {
        return app(Access::class)->isAdmin($site, $user);
    }

    public function delete(User $user, Site $site)
    {
        return app(Access::class)->isAdmin($site, $user);
    }

    public function restore(User $user, Site $site)
    {
    }

    public function forceDelete(User $user, Site $site)
    {
    }
}