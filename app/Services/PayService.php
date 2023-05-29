<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Config;
use App\Models\Subscribe;

//支付通知
class PayService
{
    public function notify(Order $order): void
    {
        $end_time = $order->price == config('hd.subscribe.permanent.price')  ?  now()->addYears(100) : now()->addYear();

        Subscribe::updateOrCreate(
            ['user_id' => $order->user_id],
            [
                'end_time' => $end_time
            ]
        );
    }
}
