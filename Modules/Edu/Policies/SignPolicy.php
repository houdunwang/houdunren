<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use Modules\Edu\Entities\Sign;
use UserService;

class SignPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        $isSign = Sign::where('user_id', $user->id)->whereDate('created_at', now())->exists();
        return !$isSign;
    }

    public function delete(User $user, Sign $sign)
    {
        return UserService::isMaster(site(), $user) || $user->id == $sign->user_id;
    }
}
