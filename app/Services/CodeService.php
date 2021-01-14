<?php

namespace App\Services;

use App\Notifications\VerificationCodeNotification;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Exception;
use Overtrue\EasySms\EasySms;
use Illuminate\Support\Facades\Cache;

/**
 * 验证码服务
 */
class CodeService
{
    public function send(string $account)
    {
        dd(site()->config);
    }

    public function action()
    {
    }

    protected function aliyun($mobile, $code)
    {
        $config = [
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
        $easySms = new EasySms($config);
        $easySms->send($mobile, [
            'template' => config('site.sms.aliyun.template'),
            'data' => [
                'code' => $code,
                'product' => site()['title'],
            ],
        ]);
    }
}
