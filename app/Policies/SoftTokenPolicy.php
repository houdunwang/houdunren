<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class SoftTokenPolicy
{
    public function before(User $user)
    {
        // if (!$user->isSubscribe) return false;
        // if ($user->softSecret &&  $user->softSecret->end_time < now()) return false;
    }

    /**
     * 获取软件令牌
     */
    public function getSoftToken(User $user): bool
    {
        return true;
    }
}
