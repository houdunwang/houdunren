<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function show()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'account' => ['required', $this->accountRule()],
            'password' => ['required', 'min:3'],
            'captcha' => ['required', 'captcha'],
        ], ['account.regex' => '帐号格式错误']);

        $isLogin = Auth::attempt([
            $this->account() => $request->account,
            'password' => $request->password
        ], $request->has('remember'));

        if ($isLogin) {
            return redirect()->intended('/')->with('message', '登录成功');
        }

        return back()->with('danger', '帐号或密码错误')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/')->with('message', '您已退出帐号');
    }
}
