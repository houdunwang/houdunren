<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function index()
    {
        return view('auth/login');
    }

    public function store(Request $request)
    {

        $request->validate([
            'mobile' => ['required', 'regex:/^1\d{10}$/'],
            'password' => ['required'],
            'captcha' => ['required', 'captcha'],
        ]);

        $isLogin = Auth::attempt($request->only('mobile', 'password'), $request->remember);

        if ($isLogin) {
            return redirect()->intended('/')->with('message', '登录成功');
        }
        return back()->with('danger', '帐号或密码错误')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/')->with('message', '退出成功');
    }
}
