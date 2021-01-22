<?php

namespace App\Services\Code;

use App\Notifications\CodeNotification;
use SmsService;
use UserService;
use Auth;
use App\Models\User;

/**
 * 验证码服务
 * @package App\Services
 */
class CodeService
{
    //发送帐号
    protected $account;

    /**
     * 发送验证码
     *
     * @param [type] $account
     * @return void
     */
    public function send($account)
    {
        $type = UserService::account();
        $this->$type($account);
    }

    /**
     * 发送邮件验证码
     *
     * @return void
     */
    public function email(string $account)
    {
        $this->account = $account;
        $user = new User();
        $user->email = $account;
        $user->notify(new CodeNotification($this->code()));
    }

    /**
     *
     * @return void
     */
    /**
     * 发送手机短信验证码
     *
     * @param string $account
     * @return void
     */
    public function mobile(string $account)
    {
        $this->account = $account;
        SmsService::send($this->account, [
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
