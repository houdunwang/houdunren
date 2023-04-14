<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function info(User $user): bool
    {
        return isAdministrator();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, User $model): bool
    {
        return isAdministrator() || $user->id == $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function removeAvatar(User $user, User $model): bool
    {
        return isAdministrator();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function lockUser(User $user, User $model): bool
    {
        return isAdministrator();
    }

    public function removeAllData(User $user, User $model): bool
    {
        return isAdministrator();
    }
}
