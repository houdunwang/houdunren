<?php

namespace App\Policies;

use App\Models\SystemConfig;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * 系统配置
 * @package App\Policies
 */
class SystemConfigPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
    }

    public function view(User $user, SystemConfig $systemConfig)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user)
    {
        return $user->isSuperAdmin;
    }

    public function delete(User $user, SystemConfig $systemConfig)
    {
    }
}
