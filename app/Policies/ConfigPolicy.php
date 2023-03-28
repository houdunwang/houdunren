<?php

namespace App\Policies;

use App\Models\Config;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ConfigPolicy
{
    public function all(): bool
    {
        return isAdministrator();
    }

    public function viewAny(User $user): bool
    {
        return isAdministrator();
    }

    public function update(User $user, Config $config): bool
    {
        return isAdministrator();
    }
}
