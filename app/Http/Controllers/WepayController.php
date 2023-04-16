<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\DouyinService;
use Illuminate\Http\Request;
use Log;
use Yansongda\Pay\Pay;
use App\Services\OrderService;
use Endroid\QrCode\Builder\Builder;
use fengkui\Pay\Bytedance;

class WepayController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['notifyUrl', 'appPay']);
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

    //APP支付
    public function appPay(Order $order)
    {
        $bytedanceConfig = [
            'app_id'        => 'ttb71fc1a22820f2a401', // App ID
            'salt'          => 'sdfsdfdsfdsf', // 支付密钥值
            'token'         => 'kldsiolkwilfkisdfllaowlfijlsdfijlwfsdfssf', // 回调验签的Token
            'notify_url'    => 'aa', // 支付回调地址
            'thirdparty_id' => '', // 第三方平台服务商 id，非服务商模式留空
        ];

        $s =  new Bytedance($bytedanceConfig);
        $s->createOrder();
        Log::info($s);
        // return app(DouyinService::class)->pay([
        //     "no" => "U1903903903",
        //     "amount" => 1,
        // ]);
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
            $this->callModuleNotify($order);
            return $pay->success();
        }
    }

    //模块异步通知
    protected function callModuleNotify(Order $order)
    {
        $class = 'Modules\\' . $order->module . '\\Core\\Pay';
        return app($class)->notify($order);
    }
}
