<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WeChat;
use Illuminate\Auth\Access\HandlesAuthorization;
use UserService;

/**
 * 微信素材
 * @package App\Policies
 */
class WeChatMaterialPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return true;
    }

    public function viewAny(User $user)
    {
    }

    public function view(User $user, WeChat $weChat)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, WeChat $weChat)
    {
    }

    public function delete(User $user, WeChat $weChat)
    {
        return UserService::isaster(site(), $user);
    }
}
