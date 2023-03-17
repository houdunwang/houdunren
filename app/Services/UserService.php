<?php

namespace App\Services;

use App\Models\User;
use Spatie\Image\Manipulations;
use App\Services\OssService;
use Auth;

class UserService
{
    public function isSubscribe(User $user = null)
    {
        $user = $user ?? Auth::user();
        $duration = $user->duration;
        return $duration && (now()->diffInMinutes($duration->end_time, false) > 0);
    }
}
