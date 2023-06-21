<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Auth;

//订单服务
class OrderService
{
    /**
     * 创建定单
     *
     * @param string $subject 订单描述
     * @param Package $package 套餐
     * @param string $payType 支付方式
     * @param array $data 额外数据
     * @param User|null $user 用户
     */
    public function create(string $subject, Package $package, string $payType, string $trade_no = null, User $user = null)
    {
        $user = $user ?? Auth::user();
        $order = $user->orders()->create([
            'sn' => $this->sn($user),
            'subject' => $subject,
            'price' => $package->price,
            "package_id" => $package->id,
            "pay_type" => $payType,
            'trade_no' => $trade_no
        ]);

        //删除无效订单
        Order::where('created_at', '<', now()->subDays(1))->where('pay_state', 0)->delete();
        return $order;
    }

    //商家订单号
    public function sn(User $user)
    {
        return "U" . $user->id . '-' . time();
    }

    /**
     * 订单完成
     *
     * @param string $sn 商家订单号
     * @param string $trade_no 支付平台订单号
     */
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
