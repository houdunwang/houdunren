<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Overtrue\EasySms\EasySms;

/**
 * 验证码服务
 */
class CodeService
{
    protected $account;

    public function __construct($account = null)
    {
        $this->account = $account;
    }

    /**
     * 发送验证码
     *
     * @return void
     */
    public function send()
    {
        $type = app(UserService::class)->account();
        $this->$type();
    }

    /**
     * 发送邮件验证码
     *
     * @return void
     */
    public function email()
    {
    }

    /**
     * 发送手机短信验证码
     *
     * @return void
     */
    public function mobile()
    {
        app(SmsService::class)->send($this->account, [
            'template' => config('site.sms.aliyun.template'),
            'data' => [
                'code' => $this->code(),
                'product' => site()['title'],
            ],
        ]);
    }

    /**
     * 验证码校对
     *
     * @param string $account
     * @param string $code
     * @return void
     */
    public function check(string $account, string $code)
    {
        return cache($account) == $code;
    }

    /**
     * 生成验证码
     *
     * @return void
     */
    protected function code()
    {
        $code = mt_rand(1000, 9999);
        cache([$this->account => $code], now()->addMinutes(10));
        return $code;
    }
}
