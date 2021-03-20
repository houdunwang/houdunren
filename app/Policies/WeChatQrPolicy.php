<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WeChatMessage;
use Illuminate\Auth\Access\HandlesAuthorization;
use UserService;

/**
 * 微信二维码
 * @package App\Policies
 */
class WeChatQrPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return UserService::isMaster(request('wechat')->site, $user);
    }

    public function viewAny(User $user)
    {
    }

    public function view(User $user, WeChatMessage $message)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, WeChatMessage $message)
    {
    }

    public function delete(User $user, WeChatMessage $message)
    {
    }
}
