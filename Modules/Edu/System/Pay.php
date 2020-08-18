<?php

namespace Modules\Edu\System;

use Log;
use Modules\Edu\Entities\Order;
use Modules\Edu\Entities\Duration;

class Pay
{
    public function notify(array $data)
    {
        $order = Order::where('sn', $data['out_trade_no'])->first();

        if ($order['status'] === false) {
            $this->changeDuration($order);
            $order['status'] = true;
            $order->save();
        }

        return redirect()->route('Edu.member.duration')->with('success', '订阅成功了，开始学习吧');
    }

    protected function changeDuration($order)
    {
        $duration = Duration::firstOrNew([
            'site_id' => site()['id'],
            'user_id' => $order['user_id'],
        ]);

        if (empty($duration['end_time']) || $duration['end_time'] < now()) {
            $duration['end_time'] = now()->addMonths($order['month']);
        } else {
            $duration['end_time'] = $duration['end_time']->addMonths($order['month']);
        }
        $duration->save();
    }
}
