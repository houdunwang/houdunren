<?php

namespace Modules\Edu\System;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\InvalidCastException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LogicException;
use Modules\Edu\Entities\Order;
use Modules\Edu\Entities\Subscribe;
use PayService;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Auth;
use Modules\Edu\Entities\Duration;

/**
 * 支付
 * @package Modules\Edu\Http\Controllers
 */
class PayController extends Controller
{
    /**
     * 支付成功通知，用于处理定单状态
     * @param string $sn
     * @return void
     */
    public function notify(string $orderSn, string $tradeNo)
    {
        $order = Order::where('sn', $orderSn)->firstOrFail();
        if (!$order['status']) {
            //更改会员周期
            if ($order['type'] == 'subscribe') {
                $duration = Duration::where('site_id', SID)->where('user_id', $order['user_id'])->first();
                $time = max(now(), $duration['end_time']);
                $duration['end_time'] = $time->addMonths($order['month']);
                $duration->save();
            }
            //修改定单状态
            $order['status'] = true;
            $order['trade_no'] = $tradeNo;
            $order->save();
        }
        return redirect('/Edu/site/' . SID . '/member/order');
    }
}
