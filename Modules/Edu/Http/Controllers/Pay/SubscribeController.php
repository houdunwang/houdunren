<?php

namespace Modules\Edu\Http\Controllers\Pay;

use App\Services\PayService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Subscribe;
use Modules\Edu\Entities\Order;
use Browser;
use Endroid\QrCode\QrCode;

class SubscribeController extends Controller
{
    protected function order($subscribe)
    {
        $order = [
            'subject' => '订阅会员：' . $subscribe->title,
            'price' => $subscribe->price,
            'sn' => 'U' . user('id') . '-' . date("Ymdhis"),
            'type' => "subscribe",
            'month' => $subscribe->month,
            'status' => false,
            'site_id' => site()['id'],
            'user_id' => user('id')
        ];

        Order::create($order);
        return $order;
    }
    public function alipay(Subscribe $subscribe, PayService $payService)
    {
        $order = $this->order($subscribe);
        $order['out_trade_no'] = $order['sn'];
        $order['total_amount'] = $order['price'];

        $action = Browser::isMobile() ? 'wap' : 'web';
        return $payService->alipay($order)->$action($order);
    }

    public function wepay(Subscribe $subscribe, PayService $payService)
    {
        $order = $this->order($subscribe);
        $order['out_trade_no'] = $order['sn'];
        $order['body'] = $order['subject'];
        $order['total_fee'] = $order['price'] * 100;

        $result = $payService->wepay($order)->scan([
            'out_trade_no' => $order['sn'],
            'body' => $order['subject'],
            'total_fee' => $order['price'] * 100,
        ]);

        //显示支付二维码
        $qrCode = new QrCode($result->code_url);
        return response($qrCode->writeString(), 200, ['Content-Type' => $qrCode->getContentType()]);
    }
}
