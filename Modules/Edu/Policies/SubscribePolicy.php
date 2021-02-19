<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use Modules\Edu\Entities\Subscribe;
use UserService;

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
        return UserService::isMaster(site(), $user);
    }

    public function update(User $user, Subscribe $subscribe)
    {
        return UserService::isMaster(site(), $user) || $user['id'] == $subscribe['user_id'];
    }

    public function delete(User $user, Subscribe $subscribe)
    {
        return UserService::isMaster(site(), $user) || $user->id == $subscribe->user_id;
    }
}
