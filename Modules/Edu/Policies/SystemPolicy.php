<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Modules\Edu\Entities\System;

class SystemPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny()
    {
        return true;
    }

    public function create(User $user, System $system)
    {
        return access();
    }

    public function update(User $user, System $system)
    {
        return access();
    }
}
