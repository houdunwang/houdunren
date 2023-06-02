<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Auth;

//订单服务
class OrderService
{
    //创建定单
    public function create(string $subject, Package $package, string $payType, array $data = [], User $user = null)
    {
        $user = $user ?? Auth::user();
        $sn = "U" . $user->id . '-' . time();
        $order = $user->orders()->create([
            'sn' => $sn,
            'subject' => $subject,
            'price' => $package->price,
            "package_id" => $package->id,
            "pay_type" => $payType,
            'data' => $data
        ]);

        //删除无效订单
        Order::where('created_at', '<', now()->subDays(1))->where('pay_state', 0)->delete();
        return $order;
    }

    //订单完成
    public function completeOrder(string $sn, string $trade_no)
    {
        $order = Order::where('sn', $sn)->firstOrFail();
        if ($order->pay_state) return false;

        $order->pay_state = true;
        $order->trade_no = $trade_no;
        $order->save();

        return $order;
    }
}
