<?php

namespace App\Services\Code;

/**
 * 验证码服务
 * @package App\Services
 */
class CodeService
{
    protected $account;

    /**
     * 发送验证码
     *
     * @param [type] $account
     * @return void
     */
    public function send($account)
    {
        $this->account = $account;
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
