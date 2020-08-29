<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Pay as ModelsPay;
use App\Models\Site;
use App\Services\PayService;
use Illuminate\Http\Request;
use App\Models\Module;
use Log as GlobalLog;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;

class PayController extends Controller
{
    public function sms()
    {
        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,
            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,
                // 默认可用的发送网关
                'gateways' => ['aliyun'],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => './easy-sms.log',
                ],
                'aliyun' => [
                    'access_key_id' => config('site.aliyun.accessKeyId'),
                    'access_key_secret' => config('site.aliyun.accessKeySecret'),
                    'sign_name' => config('site.sms.aliyun.sign'),
                ],
            ],
        ];
        $easySms = new EasySms($config);
        $easySms->send($mobile, [
            'template' => config('site.sms.aliyun.template'),
            'data' => [
                'code' => $code,
                'product' => site()['title'],
            ],
        ]);
    }
    public function __construct()
    {
        $this->middleware('front');
        $this->middleware('auth')->only(['sync']);
    }

    protected function notifyModule($module, $data)
    {
        $order = ModelsPay::where('sn', $data['out_trade_no'])->firstOrFail();
        $order["status"] = true;
        $order->save();

        $class = 'Modules\\' . $module['name'] . '\System\Pay';
        return app($class)->notify($data->toArray());
    }

    public function sync(Module $module, PayService $payService)
    {
        $data = Pay::alipay($payService->alipayConfig())->verify();
        return $this->notifyModule($module, $data);
    }

    public function async(Module $module, PayService $payService)
    {
        $alipay = Pay::alipay($payService->alipayConfig());

        $data = $alipay->verify();
        $this->notifyModule($module, $data);
        return $alipay->success();
    }

    public function wepayAsync(Module $module, PayService $payService)
    {
        $pay = Pay::wechat($payService->wepayConfig());
        $data = $pay->verify();
        $this->notifyModule($module, $data);

        return $pay->success();
    }
}
