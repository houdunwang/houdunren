<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\AccountRule;
use Illuminate\Http\Request;
use Auth;
use UserService;


/**
 * 用户登录
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * 登录界面
     *
     * @return void
     */
    public function show()
    {
        return inertia('Auth/Login/Show');
    }

    /**
     * 用户登录
     *
     * @param Request $request
     * @return void
     */
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
        ], $request->has('remember'));

        if ($isLogin) {
            return inertia()->location('/');
        }
        return back()->with('error', '帐号或密码错误');
    }

    /**
     * 退出登录
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
