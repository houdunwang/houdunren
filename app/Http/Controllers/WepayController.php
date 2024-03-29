<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Yansongda\Pay\Pay;
use App\Services\OrderService;
use App\Services\SoftSecretService;
use App\Services\SubscribeService;
use Endroid\QrCode\Builder\Builder;
use Houdunwang\Wechat\User;

//微信支付
class WepayController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['notifyUrl', 'app']);
        $config = config('pay');
        $config['wechat']['default']['notify_url'] = url('/api/wepay/notify');
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
        // return session('wechat.openid');
        // $wechatUser = app(User::class)->config(config('hd.wechat'))->snsapiBase();
        // $order = Order::find(request('order'));
        $mpOrder = [
            'out_trade_no' => $order->sn,
            'description' => $order->subject,
            'amount' => [
                'total' => $order->price * 100,
            ],
            'payer' => [
                // 'openid' => $wechatUser['openid']
                'openid' => session('wechat.openid')
            ]
        ];
        return Pay::wechat()->mp($mpOrder);
        // return $res;
        // return $this->respondWithSuccess(['res' => $res]);
        // return view('wechat-app-pay', ['res' => $res]);
    }

    //异步通知
    public function notifyUrl()
    {
        $pay = Pay::wechat();
        $result = $pay->callback();
        $ciphertext = $result['resource']['ciphertext'];
        if ($ciphertext['trade_state'] == 'SUCCESS') {
            $order = app(OrderService::class)->completeOrder($ciphertext['out_trade_no'], $ciphertext['transaction_id']);
            if ($order) {
                app(SubscribeService::class)->addSubscribe($order->user, $order->package->months);
                app(SoftSecretService::class)->addSoftSecret($order->user);
            }
            return $pay->success();
        }
    }
}
