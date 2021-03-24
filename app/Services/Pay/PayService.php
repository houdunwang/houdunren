<?php

namespace App\Services\Pay;

use Auth;

/**
 * 在线支付
 * @package App\Services\Pay
 */
class PayService
{
    /**
     * 生成定单号
     * @return string
     */
    public function sn()
    {
        return 'S' . site('id') . '-U' . Auth::id() . '-' . date('Ymdhis');
    }

    /**
     * 支付宝
     * @return AliPay
     */
    public function alipay()
    {
        return new AliPay();
    }

    /**
     * 微信支付
     * @return AliPay
     */
    public function wepay()
    {
        return new AliPay();
    }
}
