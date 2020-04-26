<?php

namespace Modules\Edu\Http\Controllers\Pay;

use App\Services\PayService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use LogicException;
use Modules\Edu\Entities\Subscribe;
use Modules\Edu\Services\OrderService;
use Symfony\Component\HttpFoundation\Response;
use Yansongda\Pay\Exceptions\InvalidConfigException;
use Yansongda\Pay\Exceptions\InvalidSignException;

/**
 * 支付处理
 * @package Modules\Edu\Http\Controllers\Front
 */
class SubscribeController extends Controller
{
    //异步通知
    protected $notify;
    //同步通知
    protected $return;

    public function __construct()
    {
        $this->notify = route('pay.subscribe.notify');
        $this->return = route('pay.subscribe.return');
    }
    /**
     * 发起支持
     * 不要使用前端代理调试，使用具体域名
     * @param Subscribe $subscribe
     * @param PayService $payService
     * @param OrderService $orderService
     * @return Response
     */
    public function alipay(Subscribe $subscribe, PayService $payService, OrderService $orderService)
    {
        $order = $orderService->create(Auth::user(), [
            'price' => $subscribe['price'],
            'subject' => $subscribe['title'],
            'type' => 'subscribe',
            'month' => $subscribe['month']
        ]);
        $order = [
            'out_trade_no' => $order->sn,
            'total_amount' =>  $order->price,
            'subject'      => $order->subject,
        ];
        return $payService->alipay($this->notify, $this->return)->web($order);
    }

    /**
     * 异步通知
     * @param PayService $payService
     * @param OrderService $orderService
     * @return Response
     * @throws LogicException
     * @throws InvalidConfigException
     * @throws InvalidSignException
     */
    public function alipayNotify(PayService $payService, OrderService $orderService)
    {
        $pay = $payService->alipay($this->notify, $this->return);
        $orderService->update($pay->verify()['out_trade_no']);
        return $pay->success();
    }

    /**
     * 同步通知
     * @param PayService $payService
     * @param OrderService $orderService
     * @return void
     * @throws LogicException
     * @throws InvalidConfigException
     * @throws InvalidSignException
     */
    public function alipayReturn(PayService $payService, OrderService $orderService)
    {
        $pay = $payService->alipay($this->notify, $this->return);
        $orderService->update($pay->verify()['out_trade_no']);
    }
}
