<?php

namespace App\Services;

use App\Notifications\VerificationCodeNotification;
use App\Models\User;
use Cache;
use Overtrue\EasySms\EasySms;

class CodeService
{
    public function check($account, $value)
    {
        return Cache::pull($account) == $value;
    }

    public function email($account)
    {
        $code = mt_rand(1000, 9999);

        Cache::put($account, $code, now()->addMinute(20));

        return app(User::class)
            ->fill(['email' => $account])
            ->notify(new VerificationCodeNotification($code));
    }

    public function mobile($mobile)
    {
        $code = mt_rand(1000, 9999);

        Cache::put($mobile, $code, now()->addMinute(20));
        $this->aliyun($mobile, $code);
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
            // 'content'  => '您的验证码为: ' . $code,
            'template' => 'SMS_12840367',
            'data' => [
                'code' => $code,
                'product' => site()['title'],
            ],
        ]);
    }
}
