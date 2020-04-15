<?php

namespace App\Services;

use AlibabaCloud\Client\Exception\ClientException;
use App\User;
use Exception;
use Illuminate\Support\Facades\Cache;
use InvalidArgumentException;

/**
 * 验证码服务
 * @package App\Services
 */
class CodeService
{
    /**
     * 验证码校验
     * @param int $code 验证码
     * @return bool
     */
    public function check($account, $code)
    {
        return Cache::get($account) == $code;
    }

    /**
     * 生成随机验证码
     * @return int
     */
    protected function getCode($account)
    {
        $code =  mt_rand(1000, 9999);
        Cache::put($account, $code);
        return $code;
    }
    /**
     * 短信验证码
     * @param mixed $account
     * @return void
     * @throws ClientException
     * @throws Exception
     */
    public function sms($account)
    {
        return (new SmsService)->code($account, $this->getCode($account));
    }

    /**
     * 邮件验证码
     * @param mixed $account
     * @return void
     */
    protected function email($account)
    {
        $user = new User();
        $user->email = $account;
        $message = [
            'subject' => '验证码',
            'content' => '验证码' . $this->getCode($account) . '，有效期30分钟。',
            'salutation' => 'Copyright © ' . config('app.name'),
        ];
        return (new MailService)->send($user, $message);
    }
}
