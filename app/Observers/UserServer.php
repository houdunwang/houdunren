<?php

namespace App\Observers;

use App\User;

class UserServer
{
    public function creating(User $user)
    {
        $user->token = str_random(10);
    }
}
