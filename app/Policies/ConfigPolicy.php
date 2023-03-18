<?php

namespace App\Policies;

use App\Models\Config;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ConfigPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return isAdministrator();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Config $config): bool
    {
        return isAdministrator();
    }
}
