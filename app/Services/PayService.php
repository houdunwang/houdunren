<?php

namespace Modules\Edu\Core;

use App\Models\Order;
use App\Models\Config;
use App\Models\Subscribe;

//支付通知
class PayService
{
    public function notify(Order $order)
    {
        $config = Config::where('id', 1)->value('data');

        $end_time = $order->price == $config['subscribe']['price_permanent'] ?  now()->addYears(100) : now()->addYear();

        Subscribe::updateOrCreate(
            ['user_id' => $order->user_id],
            [
                'end_time' => $end_time
            ]
        );

        return redirect('/Edu/member');
    }
}
