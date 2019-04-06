<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Notifications\UserNotification;
use App\User;

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

    /**
     * 发送用户通知
     * @param User $user 用户
     * @param string $message 消息内容
     * @param string $url 查看消息网址
     * @return bool
     */
    public function notify(User $user, string $message, string $url = ''): bool
    {
        if ($user['id'] != auth()->id()) {
            $user->notify(new UserNotification(['message' => $message, 'url' => $url]));
        }
        return true;
    }
}