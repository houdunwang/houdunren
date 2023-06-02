<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use App\Models\Subscribe;

//订阅服务
class SubscribeService
{
    public function addMonthsByOrder(Order $order): void
    {
        $subscribe = $order->user->subscribe;
        $end_time = now()->addMonths($order->package->months);
        if ($subscribe) {
            $end_time = $subscribe->end_time->addMonths($order->package->months);
        }

        Subscribe::updateOrCreate(
            ['user_id' => $order->user_id],
            ['end_time' => $end_time]
        );
    }
}
