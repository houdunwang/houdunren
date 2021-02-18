<?php

namespace Modules\Edu\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\InvalidCastException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LogicException;
use Modules\Edu\Entities\Order;
use Modules\Edu\Entities\Subscribe;
use PayService;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Auth;
use Modules\Edu\Entities\Duration;

/**
 * 支付
 * @package Modules\Edu\Http\Controllers
 */
class PayController extends Controller
{
    /**
     * 会员套餐订阅
     * @param Subscribe $subscribe
     * @return mixed
     * @throws InvalidCastException
     * @throws LogicException
     * @throws BindingResolutionException
     */
    public function subscribe(Subscribe $subscribe)
    {
        $sn = PayService::sn();
        //定单记录
        Order::create([
            'site_id' => SID,
            'user_id' => Auth::id(),
            'price' => $subscribe['price'],
            'subject' => $subscribe['title'],
            'sn' => $sn,
            'type' => 'subscribe', 'month' => $subscribe['month'], 'status' => 0
        ]);
        //初始会员套餐记录
        if (!Duration::where('site_id', SID)->where('user_id', Auth::id())->exists()) {
            Duration::create(
                ['site_id' => SID, 'user_id' => Auth::id(), 'begin_time' => now(), 'end_time' => now()]
            );
        }
        //发起支付
        $order = [
            'out_trade_no' => $sn,
            'total_amount' => $subscribe['price'],
            'subject' => $subscribe['title'],
        ];
        return PayService::alipay($this->url())->web($order);
    }

    /**
     * 同步通知
     * @return exit
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function return()
    {
        $data = PayService::alipay($this->url())->verify();
        $this->dealOrder($data['out_trade_no']);
        return redirect('/Edu/member/order');
    }

    /**
     * 异步通知
     * @return mixed
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function notify()
    {
        $alipay = \PayService::alipay(['return_url' => route('pay.return'), 'notify_url' => route('pay.notify')]);

        try {
            $data = $alipay->verify();
            $this->dealOrder($data['out_trade_no']);
            \Log::debug('Alipay notify', $data->all());
        } catch (\Exception $e) {
            // $e->getMessage();
        }

        return $alipay->success();
    }

    /**
     * 处理定单
     * @param string $sn
     * @return void
     */
    protected function dealOrder(string $sn)
    {
        $order = Order::where('sn', $sn)->firstOrFail();
        if (!$order['status']) {
            //更改会员周期
            if ($order['type'] == 'subscribe') {
                $duration = Duration::where('site_id', SID)->where('user_id', $order['user_id'])->first();
                $time = max(now(), $duration['end_time']);
                $duration['end_time'] = $time->addMonths($order['month']);
                $duration->save();
            }
            //修改定单状态
            $order['status'] = true;
            $order->save();
        }
    }
    /**
     * 通知链接
     * @return (UrlGenerator|string)[]
     * @throws BindingResolutionException
     */
    protected function url()
    {
        return ['return_url' => url('Edu/pay/return/' . SID), 'notify_url' => url('Edu/pay/notify/' . SID)];
    }
}
