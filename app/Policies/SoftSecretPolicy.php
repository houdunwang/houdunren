<?php

namespace App\Policies;

use App\Models\SoftSecret;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SoftSecretPolicy
{
    public function before(User $user)
    {
        if ($user->softSecret &&  $user->softSecret->end_time < now()) return false;
    }

    public function refresh(User $user): bool
    {
        // if (!$user->isSubscribe) return false;
    }
}
