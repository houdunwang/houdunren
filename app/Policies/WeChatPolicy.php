<?php

namespace App\Policies;

use App\User;
use App\Models\WeChat;
use Illuminate\Auth\Access\HandlesAuthorization;

class WeChatPolicy
{
    use HandlesAuthorization;

    public function view(User $user, WeChat $weChat)
    {
    }

    public function create(User $user)
    {
        return isSuperAdmin() || site()['admin']['id'] == $user['id'];
    }

    public function update(User $user, WeChat $weChat)
    {
    }

    public function delete(User $user, WeChat $weChat)
    {
    }

    public function restore(User $user, WeChat $weChat)
    {
    }

    public function forceDelete(User $user, WeChat $weChat)
    {
    }
}
