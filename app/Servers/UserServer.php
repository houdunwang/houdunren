<?php namespace App\Servers;

/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

use App\Exceptions\ResponseHttpException;
use App\Rules\UserPasswordRule;

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
    /**
     * 用户登录
     * name字段做为登录字段可以邮箱或手机号
     * @param array $user
     * @return bool
     */
    public function login(array $user): bool
    {
        if (filter_var($user['username'], FILTER_VALIDATE_EMAIL)) {
            return auth()->attempt(['email' => $user['username'], 'password' => $user['password']]);
        }
        if (preg_match('/^1\d{10}$/', $user['username'])) {
            return auth()->attempt(['mobile' => $user['username'], 'password' => $user['password']]);
        }
        return false;
    }
}