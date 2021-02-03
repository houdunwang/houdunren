<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use UserService;

/**
 * 会员组策略
 * @package App\Policies
 */
class GroupPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return UserService::isSuperAdmin($user);
    }

    public function view(User $user, Group $group)
    {
        return UserService::isSuperAdmin($user);
    }

    public function create(User $user)
    {
        return UserService::isSuperAdmin($user);
    }

    public function update(User $user, Group $group)
    {
        return UserService::isSuperAdmin($user);
    }

    public function delete(User $user, Group $group)
    {
        return UserService::isSuperAdmin($user);
    }
}
