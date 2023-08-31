<?php

namespace App\Services;

use App\Models\User;
use App\Models\Subscribe;

//订阅服务
class SubscribeService
{
    /**
     * 设置订阅资料
     *
     * @param User $user
     * @param integer $months
     */
    public function addSubscribe(User $user, int $months): Subscribe
    {
        $end_time = now()->addMonths($months);

        Subscribe::updateOrCreate(
            ['user_id' => $user->id],
            ['end_time' => $end_time]
        );
        return $user->refresh()->subscribe;
    }
}
