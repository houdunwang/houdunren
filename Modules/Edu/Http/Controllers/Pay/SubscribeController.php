<?php

namespace Modules\Edu\Http\Controllers\Pay;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Duration;
use Modules\Edu\Entities\Subscribe;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
use Modules\Edu\Entities\Order;

class SubscribeController extends Controller
{
    protected function config()
    {
        config(['site' => site()['config']]);
        config(['site.alipay.private_key' => config('site.alipay.merchant_private_key')]);
        config(['site.alipay.ali_public_key' => config('site.alipay.alipay_public_key')]);
        config(['site.alipay.notify_url' => route('Edu.pay.subscribe.alipay.notify')]);
        config(['site.alipay.return_url' => route('Edu.pay.subscribe.alipay.return')]);

        return config('site.alipay');
    }

    public function alipay(Subscribe $subscribe)
    {
        $sn = 'U' . user('id') . '-' . date("Ymdhis");
        $order = [
            'out_trade_no' => $sn,
            'total_amount' => $subscribe->price,
            'subject' => '订阅会员：' . $subscribe->title,
            'price' => $subscribe->price,
            'sn' => $sn,
            'type' => "subscribe",
            'month' => $subscribe->month,
            'status' => false,
            'site_id' => site()['id'],
            'user_id' => user('id')
        ];
        Order::create($order);

        $alipay = Pay::alipay($this->config())->web($order);

        return $alipay;
    }

    public function alipayReturn()
    {
        $data = Pay::alipay($this->config())->verify();

        $order = Order::where('sn', $data['out_trade_no'])->first();
        if ($order['status'] === false) {

            $duration = Duration::firstOrNew([
                'site_id' => site()['id'], 'user_id' => user('id')
            ]);
            $duration['end_time'] = max($duration['end_time'] ?? now(), now());

            $duration['end_time'] = $duration['end_time']->addMonths($order['month']);

            $duration->save();

            $order["status"] = true;
            $order->save();
        }

        return redirect('/')->with('success', '订阅成功了，开始学习吧');

        // 订单号：$data->out_trade_no
        // 支付宝交易号：$data->trade_no
        // 订单总金额：$data->total_amount
    }

    public function alipayNotify()
    {
        $alipay = Pay::alipay($this->config());

        try {
            $data = $alipay->verify(); // 是的，验签就这么简单！

            // 请自行对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。
            // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号；
            // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）；
            // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）；
            // 4、验证app_id是否为该商户本身。
            // 5、其它业务逻辑情况

            Log::debug('Alipay notify', $data->all());
        } catch (\Exception $e) {
            // $e->getMessage();
        }

        return $alipay->success();
        // return $alipay->success()->send(); // laravel 框架中请直接 `return $alipay->success()`
    }
}
