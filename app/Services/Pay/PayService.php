<?php

namespace App\Services\Pay;

use App\Exceptions\InvalidRequestException;
use App\Models\Pay as ModelsPay;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\InvalidCastException;
use LogicException;
use Yansongda\Pay\Gateways\Alipay;
use Yansongda\Pay\Gateways\Wechat;

/**
 * 在线支付
 * @package App\Services\Pay
 */
class PayService
{
    // public function alipayConfig()
    // {
    //     $config = config('site.alipay');
    //     $config['return_url'] = route('common.pay.sync', [module()['id']]);
    //     $config['notify_url'] = route('common.pay.async', [module()['id']]);
    //     if (empty($config['mode'])) unset($config['mode']);

    //     return $config;
    // }

    // public function wepayConfig()
    // {
    //     $config = config('site.wepay');
    //     $config['notify_url'] = route('common.pay.wepay', module()['id']);
    //     if (empty($config['mode'])) unset($config['mode']);
    //     return $config;
    // }

    // protected function check($order)
    // {
    //     $vars = ['sn', 'price', 'subject'];
    //     foreach ($vars as $v) {
    //         if (!key_exists($v, $order)) throw new Exception('参数错误');
    //     }
    // }
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

    /**
     * 入库
     * @param array $order
     * @param string $type
     * @return void
     * @throws InvalidCastException
     * @throws LogicException
     */
    // protected function save(array $order, string $type)
    // {
    //     $order['type'] = $type;
    //     $order['site_id'] = site()['id'];
    //     $order['module_id'] = module()['id'];
    //     $order['user_id'] = Auth::id();
    //     ModelsPay::create($order);
    // }
}
