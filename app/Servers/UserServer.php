<?php namespace App\Servers;

use App\Rules\UserPasswordRule;
use App\User;
use Illuminate\Http\Request;

/**
 * 会员服务
 * Class UserServer
 * @package App\Servers
 */
class UserServer
{
    /**
     * 用户登录
     * name字段做为登录字段可以邮箱或手机号
     * @param array $user
     * @return bool
     */
    public function login(array $user): bool
    {
        $isEmail = filter_var($user['name'], FILTER_VALIDATE_EMAIL);
        if ($isEmail) {
            return auth()->attempt(['email' => $user['name'], 'password' => $user['password']]);
        } else {
            return auth()->attempt(['mobile' => $user['name'], 'password' => $user['password']]);
        }
    }
}