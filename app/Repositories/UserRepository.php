<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-08
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Exceptions\InvalidParamException;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

/**
 * 会员管理仓库
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * 根据邮箱查找
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    /**
     * 根据手机号查找
     * @param string $mobile
     * @return User|null
     */
    public function findByMobile(string $mobile): ?User
    {
        return User::where('email', $mobile)->first();
    }

    public function changePassword(Request $request, User $user): bool
    {
        if ($user['password'] != $request['original_password']) {
            throw new InvalidParamException('原密码输入错误');
        }
        $user['password'] = bcrypt($user['password']);
        $user->save();
        return true;
    }
}