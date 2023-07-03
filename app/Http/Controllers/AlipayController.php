<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use App\Services\SoftSecretService;
use App\Services\SubscribeService;
use Illuminate\Http\Request;
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
        $this->processOrder($result);
        return redirect('member/subscribe');
    }

    //异步通知
    public function notifyUrl()
    {
        $pay = Pay::alipay();
        $result = $pay->callback();
        $this->processOrder($result);
        return $pay->success();
    }

    //处理订单
    protected function processOrder($result)
    {
        if (!$result->out_trade_no) return;
        $order = app(OrderService::class)->completeOrder($result->out_trade_no, $result->trade_no);

        if ($order) {
            app(SubscribeService::class)->addSubscribe($order->user, $order->package->months);
            // app(SoftSecretService::class)->addSoftSecret($order);
        }
    }
}
