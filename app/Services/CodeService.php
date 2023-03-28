<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\EmailCodeNotification;
use Cache;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

//发送短信或邮件验证码
class CodeService
{
    public function send($account)
    {
        $code = $this->code($account);
        filter_var($account, FILTER_VALIDATE_EMAIL) ? $this->email($account, $code) : $this->sms($account, $code);
    }

    //邮箱验证码
    protected function email($email, $code)
    {
        $user = User::factory()->make(['email' => $email]);
        $user->notify(new EmailCodeNotification($code));
    }

    //短信验证码
    protected function sms($mobile, $code)
    {
        app(AliyunService::class)->sms([
            'sign' => config('hd.sms.aliyun_code_sign'),
            'template' => config('hd.sms.aliyun_code_template'),
            'phone' => $mobile,
            'params' => ["code" => $code, "product" => config('hd.sms.aliyun_code_sign')]
        ]);
    }

    //获取验证码
    public function code($account): int
    {
        $code = mt_rand(1000, 9999);
        $time = config('hd.sms.code_timeout');
        Cache::put($account, $code, now()->addSeconds($time));
        return $code;
    }
}
