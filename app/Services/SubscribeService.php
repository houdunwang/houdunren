<?php

namespace App\Services;

use App\Models\User;
use App\Models\Subscribe;

//订阅服务
class SubscribeService
{
    public function update(User $user, int $price)
    {
        return Subscribe::updateOrCreate(
            ['user_id' => $user->id],
            [
                'end_time' => $price == config('hd.subscribe.permanent.price') ?  now()->addYears(100) : now()->addYear()
            ]
        );
    }
}
