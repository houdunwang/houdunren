<?php

namespace App\Http\Controllers\Common;

use App\Exceptions\PayException;
use App\Exceptions\ValidException;
use App\Models\Order;
use Houdunwang\Alipay\AliPay;
use App\Http\Controllers\Controller;

/**
 * 支付通知
 * Class AliPayNotifyController
 * @package App\Http\Controllers\Common
 */
class PayNotifyController extends Controller
{
    protected $order;

    /**
     * 处理系统定单
     * @param string $orderSn 商户订单号
     * @param string $tradeNo 支付宝交易号
     * @return bool
     */
    protected function changeOrderState(string $orderSn, string $tradeNo)
    {
        $this->order = Order::where('order_sn', $orderSn)->first();
        //避免重复处理定单
        if ($this->order['status']) {
            return redirect('/')->with('success', '恭喜你，定单已经处理完毕');
        }
        $this->order['alipay_trade_no'] = $tradeNo;
        $this->order['status'] = true;
        $this->order->save();
        //触发模块通知
        $callback = module_namespace($this->order['module']) . '\System\PayNotify@sync';
        return app()->call($callback, ['payOrder' => $this->order]);
    }

    /**
     * 同步通知
     */
    public function sync()
    {
        //签名验证
        if (AliPay::signCheck()) {
            return $this->changeOrderState(
                htmlspecialchars($_GET['out_trade_no']),
                htmlspecialchars($_GET['trade_no']));
        } else {
            return redirect('/')->with('success', '支付失败');
        }
    }

    /**
     * 异步通知
     * @return string
     * @throws \Exception
     */
    public function async()
    {
        //签名验证
        if (Alipay::signCheck() && in_array($_POST['trade_status'], ['TRADE_FINISHED', 'TRADE_SUCCESS'])) {
            //支付宝交易号
            if ($_POST['trade_status'] == 'TRADE_FINISHED') {
                $this->changeOrderState($_POST['out_trade_no'], $_POST['trade_no']);
            } elseif ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                //交易完成时的业务处理
                $this->changeOrderState($_POST['out_trade_no'], $_POST['trade_no']);
            }
            return 'success';
        }
        return 'fail';
    }
}
