<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Log;
use Yansongda\Pay\Pay;

class AlipayController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only('createOrder');

        $config = config('pay');
        $config['alipay']['default']['return_url'] = url('/api/alipay/return');
        $config['alipay']['default']['notify_url'] = url('/api/alipay/notify');
        Pay::config($config);
    }

    //发起支付
    public function pay(Order $order)
    {

        return Pay::alipay()->web([
            //商户订单
            'out_trade_no' => $order->sn,
            'total_amount' => $order->price,
            'subject' => $order->subject,
        ]);
    }

    //同步通知
    public function returnUrl()
    {
        $result = Pay::alipay()->callback();
        //修改订单状态，更改会员周期
        $order = app(OrderService::class)->completeOrder($result->out_trade_no, $result->trade_no);
        return $this->callModuleNotify($order);
    }

    //异步通知
    public function notifyUrl()
    {
        $pay = Pay::alipay();
        $result = $pay->callback();
        //修改订单状态，更改会员周期
        if ($result->out_trade_no) {
            $order = app(OrderService::class)->completeOrder($result->out_trade_no, $result->trade_no);
            $this->callModuleNotify($order);
            return $pay->success();
        }
    }

    //模块异步通知
    public function callModuleNotify(Order $order)
    {
        $class = 'Modules\\' . $order->module . '\\Services\\PayService';
        return app($class)->notify($order);
    }
}
