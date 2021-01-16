<?php

namespace App\Services\User;

use App\Models\Site;
use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Auth;

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
     * 超级管理员检测
     *
     * @param User $user
     * @return boolean
     */
    public function isSuperAdmin(User $user = null): bool
    {
        $user = $user ?? Auth::user();
        if ($user) {
            return Auth()->check() && Auth::user()->isSuperAdmin;
        }
        return false;
    }

    /**
     * 站点管理员检测
     *
     * @param User $user
     * @param Site $site
     * @return boolean
     */
    public function isMaster(User $user = null, Site $site = null): bool
    {
        $site = $site ?? site();
        $user = $user ?? Auth::user();

        if ($site && $user) {
            return $this->isSuperAdmin($user) || $user['id'] == $site['user_id'];
        }
        return false;
    }

    /**
     * 是否为站点管理员
     * 如果管理员没有配置权限将无法管理站点
     * @param User $user
     * @param Site $site
     * @return boolean
     */
    public function isAdmin(User $user = null, Site $site = null): bool
    {
        $site = $site ?? site();
        $user = $user ?? Auth::user();

        if ($site && $user) {
            return $site->isAdmin($user);
        }
        return false;
    }

    // /**
    //  * 帐号验证规则
    //  * 根据提交的帐号数据使用不同验证规则
    //  * @return string
    //  * @throws BindingResolutionException
    //  */
    // public function accountValidateRule()
    // {
    //     return filter_var(request()->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'regex:/^1\d{10}$/';
    // }

    // /**
    //  * 验证码验证规则
    //  *
    //  * @return void
    //  */
    // public function captchaValidateRule()
    // {
    //     return  'captcha_api:' . request('captcha.key');
    // }

    // /**
    //  * 帐号验证错误消息
    //  *
    //  * @return array
    //  */
    // public function accountValidateErrors(): array
    // {
    //     return ['account.email' => '帐号格式错误', 'account.regex' => '帐号格式错误'];
    // }

    // /**
    //  * 验证码验证错误消息
    //  *
    //  * @return array
    //  */
    // public function captchaValidateErrors(): array
    // {
    //     return ['captcha.value.required' => '验证码不能为空', 'captcha.value.captcha_api' => '验证码输入错误'];
    // }
}
