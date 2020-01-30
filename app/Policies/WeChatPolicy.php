<?php

namespace App\Policies;

use App\Models\WeChat;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WeChatPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return $user->isSuperAdmin() ?: $this->deny('你没有操作权限');
    }

    /**
     * Determine whether the user can view any we chats.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the we chat.
     *
     * @param \App\User $user
     * @param \App\Models\WeChat $weChat
     * @return mixed
     */
    public function view(User $user, WeChat $weChat)
    {
        //
    }

    /**
     * Determine whether the user can create we chats.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the we chat.
     *
     * @param \App\User $user
     * @param \App\Models\WeChat $weChat
     * @return mixed
     */
    public function update(User $user, WeChat $weChat)
    {
        //
    }

    /**
     * Determine whether the user can delete the we chat.
     *
     * @param \App\User $user
     * @param \App\Models\WeChat $weChat
     * @return mixed
     */
    public function delete(User $user, WeChat $weChat)
    {
        //
    }

    /**
     * Determine whether the user can restore the we chat.
     *
     * @param \App\User $user
     * @param \App\Models\WeChat $weChat
     * @return mixed
     */
    public function restore(User $user, WeChat $weChat)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the we chat.
     *
     * @param \App\User $user
     * @param \App\Models\WeChat $weChat
     * @return mixed
     */
    public function forceDelete(User $user, WeChat $weChat)
    {
        //
    }
}
