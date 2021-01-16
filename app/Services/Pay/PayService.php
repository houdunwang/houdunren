<?php

namespace App\Services\Pay;

use App\Exceptions\InvalidRequestException;
use App\Models\Pay as ModelsPay;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;

class PayService
{
    public function alipayConfig()
    {
        $config = config('site.alipay');
        $config['return_url'] = route('common.pay.sync', [module()['id']]);
        $config['notify_url'] = route('common.pay.async', [module()['id']]);
        if (empty($config['mode'])) unset($config['mode']);

        return $config;
    }

    public function wepayConfig()
    {
        $config = config('site.wepay');
        $config['notify_url'] = route('common.pay.wepay', module()['id']);
        if (empty($config['mode'])) unset($config['mode']);
        return $config;
    }

    protected function check($order)
    {
        $vars = ['sn', 'price', 'subject'];
        foreach ($vars as $v) {
            if (!key_exists($v, $order)) throw new InvalidRequestException('参数错误');
        }
    }

    public function alipay(array $order)
    {
        $order['out_trade_no'] = $order['sn'];
        $order['total_amount'] = $order['price'];
        $this->check($order);
        $this->record($order, 'alipay');

        return Pay::alipay($this->alipayConfig());
    }

    public function wepay(array $order)
    {
        $order['out_trade_no'] = $order['sn'];
        $order['body'] = $order['subject'];
        $order['total_fee'] = $order['price'] * 100;
        $this->check($order);
        $this->record($order, 'wepay');

        return Pay::wechat($this->wepayConfig());
    }

    protected function record(array $order, string $type)
    {
        $order['type'] = $type;
        $order['site_id'] = site()['id'];
        $order['module_id'] = module()['id'];
        $order['user_id'] = user('id');
        ModelsPay::create($order);
    }
}
