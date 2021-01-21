<?php

namespace App\Api\Auth;

use App\Http\Controllers\Controller;
use App\Rules\AccountRule;
use Illuminate\Http\Request;
use UserService;
use Auth;

class LoginController extends Controller
{
    /**
     * 帐号登录
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request, UserService $userService)
    {
        $request->validate([
            'account' => [new AccountRule(request('account'))],
            'password' => ['required'],
            'captcha' => ['required', 'captcha']
        ], ['password.required' => '密码不能为空', 'captcha.required' => '验证码不能为空', 'captcha.captcha' => '验证码输入错误']);

        $isLogin = Auth::attempt([
            UserService::account() => $request->account,
            'password' => $request->password
        ]);

        if ($isLogin) {
            $token = Auth::user()->createToken('auth');
            return ['message' => '登录成功', 'token' => $token->plainTextToken];
        }
        return response(['message' => '登录失败'], 401);
    }
}
