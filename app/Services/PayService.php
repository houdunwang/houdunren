<?php

namespace App\Services;

use Yansongda\Pay\Gateways\Alipay;
use Yansongda\Pay\Pay;

/**
 * 支付宝支付服务
 * @package App\Services
 */
class PayService
{
  /**
   * 支付宝服务
   * @param string $notify_url 异步通知地址
   * @param string $return_url 同步跳转地址
   * @return Alipay
   */
  public function alipay(string $notify_url, string $return_url)
  {
    $config = [
      'app_id' => config('site.alipay.app_id.value'),
      'notify_url' => $notify_url,
      'return_url' => $return_url,
      'ali_public_key' =>  config('site.alipay.alipay_public_key.value'),
      'private_key' => config('site.alipay.merchant_private_key.value'),
      'log' => [ // optional
        'file' =>  './logs/alipay.log',
        'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
        'type' => 'single', // optional, 可选 daily.
        'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
      ],
      'http' => [ // optional
        'timeout' => 5.0,
        'connect_timeout' => 5.0,
      ],
    ];
    // dd($config);
    return Pay::alipay($config);
  }
}
