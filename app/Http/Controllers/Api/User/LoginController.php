<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Rules\AccountRule;
use Illuminate\Http\Request;
use Auth;
use UserService;

/**
 * 用户登录
 * @package App\Http\Controllers\Api\User
 */
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'account' => [new AccountRule(request('account'))],
            'password' => ['required'],
            // 'captcha' => ['required', 'captcha']
        ], ['password.required' => '密码不能为空', 'captcha.required' => '验证码不能为空', 'captcha.captcha' => '验证码输入错误']);

        $isLogin = Auth::attempt([
            UserService::account() => $request->account,
            'password' => $request->password
        ]);

        if ($isLogin) {
            $token  = Auth::user()->createToken('auth')->plainTextToken;
            return ['message' => '登录成功', 'token' => $token];
        }
        return response(['message' => '登录失败'], 403);
    }
}
