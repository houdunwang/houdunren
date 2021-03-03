<?php

namespace App\Services\Pay;

use Illuminate\Contracts\Container\BindingResolutionException;
use Yansongda\Pay\Pay;


/**
 * 支付宝
 * @package App\Services\Pay
 */
class AliPay
{
    protected $pay;

    public function __construct()
    {
        $this->init();
    }

    /**
     * 支付服务
     * @param array $config ['return_url'=>'同步通知地址','notify_url'=>'异步通知地址']:
     * @return Alipay
     * @throws BindingResolutionException
     */
    public function init()
    {
        $config =  [
            'return_url' => route('pay.alipay.return', [MID]),
            'notify_url' => route('pay.alipay.notify', [MID]),
        ] + config('site.alipay');
        if (empty($config['mode'])) unset($config['mode']);
        $this->pay = Pay::alipay($config);
    }

    /**
     * 发起支付
     * @param array $order
     * @return mixed
     */
    public function order(array $order)
    {
        //支付
        $order['total_amount'] = $order['price'];
        $order['out_trade_no'] = $order['sn'];
        $order['subject'] = $order['subject'];
        return $this->pay->web($order);
    }

    /**
     * 支付网关用于支付身份验证等
     * @return mixed
     */
    public function gatway()
    {
        return $this->pay;
    }
}
