<?php

namespace Modules\Edu\Http\Controllers;

use Illuminate\Database\Eloquent\InvalidCastException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LogicException;
use Modules\Edu\Entities\Order;
use Modules\Edu\Entities\Subscribe;
use PayService;
use Auth;
use Modules\Edu\Entities\Duration;

/**
 * 定单处理
 * @package Modules\Edu\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * 会员套餐订阅
     * @param Subscribe $subscribe
     * @return mixed
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function subscribe(Subscribe $subscribe)
    {
        $sn = PayService::sn();
        //定单记录
        $order = Order::create([
            'site_id' => SID,
            'user_id' => Auth::id(),
            'price' => $subscribe['price'],
            'subject' => $subscribe['title'],
            'sn' => $sn,
            'type' => 'subscribe', 'month' => $subscribe['month'], 'status' => 0
        ]);
        //初始会员套餐记录
        if (!Duration::where('site_id', SID)->where('user_id', Auth::id())->exists()) {
            Duration::create(
                ['site_id' => SID, 'user_id' => Auth::id(), 'begin_time' => now(), 'end_time' => now()]
            );
        }
        return $this->alipay($order);
    }

    /**
     * 支付宝
     * @param mixed $order
     * @return mixed
     */
    protected function alipay($order)
    {
        return PayService::alipay()->order($order->toArray());
    }
}
