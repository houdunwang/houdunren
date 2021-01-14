<?php

namespace App\Services;

use Exception;
use Overtrue\EasySms\EasySms;

/**
 * 短信服务
 */
class SmsService
{
    /**
     * 网关配置
     *
     * @return array
     */
    protected function config(): array
    {
        return  [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,
            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,
                // 默认可用的发送网关
                'gateways' => ['aliyun'],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => './easy-sms.log',
                ],
                'aliyun' => [
                    'access_key_id' => config('site.aliyun.accessKeyId'),
                    'access_key_secret' => config('site.aliyun.accessKeySecret'),
                    'sign_name' => config('site.sms.aliyun.sign'),
                ],
            ],
        ];
    }

    /**
     * 发送短信
     *
     * @param string $mobile 手机号
     * @param array $data 短信内容
     * @return void
     */
    public function send(string $mobile, array $data)
    {
        $easySms = new EasySms($this->config());
        return $easySms->send($mobile, $data);
    }
}
