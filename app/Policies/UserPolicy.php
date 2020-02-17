<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->is_super_admin) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, User $model)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, User $model)
    {
    }

    public function delete(User $user, User $model)
    {
    }

    public function restore(User $user, User $model)
    {
    }

    public function forceDelete(User $user, User $model)
    {
    }
}
