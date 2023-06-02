<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Log;
use Yansongda\Pay\Pay;
use App\Services\OrderService;
use App\Services\PayService;
use Endroid\QrCode\Builder\Builder;

class WepayController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['notifyUrl', 'appPay']);
        $config = config('pay');
        $config['wepay']['default']['notify_url'] = url('/api/wepay/notify');
        Pay::config($config);
    }

    //发起支付
    public function pay(Order $order)
    {
        $order = [
            'out_trade_no' => $order->sn,
            'description' => $order->subject,
            'amount' => [
                'total' =>  $order->price * 100,
            ],
        ];

        $result = Pay::wechat()->scan($order);
        //生成支付二维码
        return Builder::create()->data($result['code_url'])->build()->getDataUri();
    }

    //公众号支付
    public function app(Order $order)
    {
        $mpOrder = [
            'out_trade_no' => $order->sn,
            'description' => $order->subject,
            'amount' => [
                'total' => $order->price * 100,
            ],
            'payer' => [
                'openid' => \Auth::user()->openid
            ]
        ];
        return Pay::wechat()->mp($mpOrder);
    }

    //异步通知
    public function notifyUrl()
    {
        $pay = Pay::wechat();
        $result = $pay->callback();
        $ciphertext = $result['resource']['ciphertext'];
        if ($ciphertext['trade_state'] == 'SUCCESS') {
            $order = app(OrderService::class)->completeOrder($ciphertext['out_trade_no'], $ciphertext['transaction_id']);
            app(PayService::class)->notify($order);
            return $pay->success();
        }
    }
}
