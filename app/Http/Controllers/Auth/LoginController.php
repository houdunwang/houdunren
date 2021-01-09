<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'account' => ['required', $this->accountRule()],
            'password' => ['required', 'min:3'],
            'captcha' => ['required', 'captcha'],
        ], ['account.regex' => '帐号格式错误', 'captcha.required' => '验证码不能为空', 'captcha.captcha' => '验证码输入错误']);


        $isLogin = Auth::attempt([
            $this->account() => $request->account,
            'password' => $request->password
        ], $request->has('remember'));

        if (!$isLogin) {
            return back()->with('error', '帐号或密码错误');
        }
        return inertia()->location('/');
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
