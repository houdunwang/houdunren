<?php

namespace App\Policies;

use App\Models\Soft;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SoftPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Soft $soft): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return isAdministrator();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Soft $soft): bool
    {
        return isAdministrator();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Soft $soft): bool
    {
        return isAdministrator();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Soft $soft): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Soft $soft): bool
    {
        //
    }
}
