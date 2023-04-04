<?php

namespace App\Policies;

use App\Models\Module;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ModulePolicy
{
    public function before(User $user)
    {
        return $user->isAdministrator;
    }

    public function viewAny(User $user): bool
    {
        return isAdministrator();
    }

    public function view(User $user, Module $module): bool
    {
        return isAdministrator();
    }

    public function create(User $user): bool
    {
        return isAdministrator();
    }

    public function update(User $user, Module $module): bool
    {
        return isAdministrator();
    }

    public function unInstall(User $user, Module $module): bool
    {
        return isAdministrator();
    }

    public function install(User $user, Module $module): bool
    {
        return isAdministrator();
    }
}
