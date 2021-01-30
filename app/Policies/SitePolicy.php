<?php

namespace App\Policies;

use App\Models\Site;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use UserService;

/**
 * 站点权限验证
 */
class SitePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin) {
            return true;
        }
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
        return $user['id'] == $site['user_id'];
    }

    public function delete(User $user, Site $site)
    {
        return $user['id'] == $site['user_id'];
    }
}
