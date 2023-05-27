<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Sign;

class SignPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        $isSign = $user->model('Edu')->signs()->whereDate('created_at', now())->exists();
        if ($isSign) abort(403, '今天已经签到过了');
        return true;
    }

    public function delete(User $user, sign $sign)
    {
        return $user->is_administrator || $user->id == $sign->user_id;
    }
}
