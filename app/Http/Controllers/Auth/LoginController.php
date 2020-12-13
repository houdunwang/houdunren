<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use RuntimeException;

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
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function show()
    {
        return inertia('Auth/Login/Show');
    }

    /**
     * 用户登录
     * @param Request $request
     * @return mixed
     * @throws BindingResolutionException
     * @throws RuntimeException
     */
    public function login(Request $request)
    {
        $request->validate([
            'account' => ['required', $this->accountRule()],
            'password' => ['required', 'min:3'],
            'captcha' => ['required', 'captcha'],
        ], ['account.regex' => '帐号格式错误', 'captcha.captcha' => '验证码输入错误']);



        $isLogin = Auth::attempt([
            $this->account() => $request->account,
            'password' => $request->password
        ], $request->has('remember'));

        if (!$isLogin) {
            return redirect()->back()->with('error', '帐号或密码错误');
        }
        return inertia()->location('/');
    }

    /**
     * 退出登录
     * @return Redirector|RedirectResponse
     * @throws RuntimeException
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
        // return redirect('/')->with('message', '您已退出帐号');
    }
}
