<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use UserService;
use Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, User $model)
    {
        return UserService::isSuperAdmin($user) || $user['id'] == $model['id'];
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, User $model)
    {
        return UserService::isSuperAdmin($user) ||  $user['id'] == $model['id'];
    }

    public function delete(User $user, User $model)
    {
        return UserService::isSuperAdmin($user);
    }
}
