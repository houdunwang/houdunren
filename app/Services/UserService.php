<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * 用户服务
 */
class UserService
{
    /**
     * 登录字段
     * @return string
     * @throws BindingResolutionException
     */
    public function account()
    {
        return filter_var(request()->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }

    /**
     * 帐号验证规则
     * 根据提交的帐号数据使用不同验证规则
     * @return string
     * @throws BindingResolutionException
     */
    public function accountValidateRule()
    {
        return filter_var(request()->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'regex:/^1\d{10}$/';
    }

    /**
     * 验证码验证规则
     *
     * @return void
     */
    public function captchaValidateRule()
    {
        return  'captcha_api:' . request('captcha.key');
    }

    /**
     * 帐号验证错误消息
     *
     * @return array
     */
    public function accountValidateErrors(): array
    {
        return ['account.email' => '邮箱格式错误', 'account.regex' => '手机号码错误'];
    }

    /**
     * 验证码验证错误消息
     *
     * @return array
     */
    public function captchaValidateErrors(): array
    {
        return ['captcha.value.required' => '验证码不能为空', 'captcha.value.captcha_api' => '验证码输入错误'];
    }
}
