<?php

namespace App\Policies;

use App\Models\SoftSecret;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SoftSecretPolicy
{
    public function before(User $user)
    {
        if (!$user->isSubscribe) return false;
        if ($user->softSecret &&  $user->softSecret->end_time < now()) return false;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function getSoftSecret(User $user): bool
    {
        return true;
    }

    public function refresh(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SoftSecret $softSecret): bool
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

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SoftSecret $softSecret): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SoftSecret $softSecret): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SoftSecret $softSecret): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SoftSecret $softSecret): bool
    {
        //
    }
}
