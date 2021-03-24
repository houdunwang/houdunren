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
        return true;
    }

    public function view(User $user, WeChat $weChat)
    {
        return true;
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
