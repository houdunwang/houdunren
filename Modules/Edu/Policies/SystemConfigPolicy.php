<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use Modules\Edu\Entities\System;
use UserService;

/**
 * 系统配置
 * @package Modules\Edu\Policies
 */
class SystemConfigPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user)
    {
        return true;
    }

    public function view(?User $user)
    {
        return true;
    }

    public function create(User $user)
    {
    }

    public function update(User $user, System $system)
    {
        return UserService::isMaster(site(), $user) || $user['id'] == $system['user_id'];
    }

    public function delete(User $user, System $system)
    {
        return UserService::isMaster(site(), $user) || $user->id == $system->user_id;
    }
}
