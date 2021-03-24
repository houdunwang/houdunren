<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use Modules\Edu\Entities\Subscribe;

/**
 * 订阅套餐
 * @package Modules\Edu\Policies
 */
class SubscribePolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user)
    {
        return true;
    }

    public function view(?User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        return access();
    }

    public function update(User $user, Subscribe $subscribe)
    {
        return access();
    }

    public function delete(User $user, Subscribe $subscribe)
    {
        return access();
    }
}
