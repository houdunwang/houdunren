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
