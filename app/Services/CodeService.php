<?php

namespace App\Services;

use App\Notifications\VerificationCodeNotification;
use App\Models\User;
use Cache;
use Dotenv\Exception\ValidationException;
use Exception;
use Overtrue\EasySms\EasySms;

class CodeService
{
    //发送时间间隔单位分钟
    public $minute = 1;

    public function check($account, $value): bool
    {
        if ($data = Cache::get($account)) {
            return $data['code'] == $value;
        }
        return false;
    }

    protected function cache($account, $code)
    {
        Cache::put($account, ['code' => $code, 'time' => now()], now()->addMinute(30));
    }

    public function email($email)
    {
        $this->checkSend($email);
        $code = mt_rand(1000, 9999);
        app(User::class)
            ->fill(['email' => $email])
            ->notify(new VerificationCodeNotification($code));
        $this->cache($email, $code);
    }

    public function mobile($mobile)
    {
        $this->checkSend($mobile);
        $code = mt_rand(1000, 9999);
        try {
            $this->aliyun($mobile, $code);
            $this->cache($mobile, $code);
        } catch (Exception $e) {
            throw new ValidationException('发送失败，请稍候再试');
        }
    }

    public function checkSend($account)
    {
        if ($data = Cache::get($account)) {
            $timeout = now()->diffInSeconds($data['time']->addMinute($this->minute), false);
            if ($timeout > 0) {
                abort(403, "请等待{$timeout}秒操作");
            }
        }
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
