<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WeChat;
use Illuminate\Auth\Access\HandlesAuthorization;
use UserService;

/**
 * 公众号
 * @package App\Policies
 */
class WeChatPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return UserService::isAdmin(site(), $user);
    }

    public function view(User $user, WeChat $weChat)
    {
        return UserService::isAdmin(site(), $user);
    }

    public function create(User $user)
    {
        return UserService::isMaster(site(), $user);
    }

    public function update(User $user, WeChat $weChat)
    {
        return UserService::isMaster(site(), $user);
    }

    public function delete(User $user, WeChat $weChat)
    {
        return UserService::isMaster(site(), $user);
    }
}
