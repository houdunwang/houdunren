<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WeChatMessage;
use Illuminate\Auth\Access\HandlesAuthorization;
use UserService;

/**
 * 微信回复
 * @package App\Policies
 */
class WeChatMessagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, WeChatMessage $message)
    {
        return true;
    }

    public function create(User $user)
    {
        return UserService::isMaster(site(), $user);
    }

    public function update(User $user, WeChatMessage $message)
    {
        return UserService::isMaster(site(), $user);
    }

    public function delete(User $user, WeChatMessage $message)
    {
        return UserService::isMaster(site(), $user);
    }
}
