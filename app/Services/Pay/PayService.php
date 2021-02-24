<?php

namespace App\Services\Pay;

use Illuminate\Contracts\Container\BindingResolutionException;
use Yansongda\Pay\Gateways\Alipay;
use Yansongda\Pay\Gateways\Wechat;
use Yansongda\Pay\Pay;
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
        return 'U' . Auth::id() . '-' . date('Ymdhis');
    }

    /**
     * 支付宝
     * @param array $config ['return_url'=>'同步通知地址','notify_url'=>'异步通知地址']:
     * @return Alipay
     * @throws BindingResolutionException
     */
    public function alipay(array $config)
    {
        $config = config('site.alipay') + $config;
        if (empty($config['mode'])) unset($config['mode']);
        return Pay::alipay($config);
    }

    /**
     * 微信支付
     * @param array $config $config['notify_url'] = 异步通知地址;
     * @return Wechat
     * @throws BindingResolutionException
     */
    public function wepay(array $config)
    {
        $config = config('site.wepay') + $config;
        if (empty($config['mode'])) unset($config['mode']);
        return Pay::wechat($config);
    }
}
