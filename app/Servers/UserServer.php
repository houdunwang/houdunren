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

    /**
     * 修改密码
     * @param User $user
     * @param Request $request [original_password:原密码,password:新密码,password_confirmation:确认密码]
     * @return bool
     */
    public function changePassword(User $user, Request $request): bool
    {
        $request->validate([
            'original_password' => ['sometimes', new UserPasswordRule()],
            'password' => ['required', 'min:5', 'confirmed'],
        ], ['password.confirmed' => '确认密码输入错误']);

        $user['password'] = \Hash::make($request['password']);
        return $user->save();
    }

    public function setIcon(User $user,string $icon): bool
    {

    }
}