<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['logout']]);
        $this->middleware('guest', ['only' => ['login', 'store']]);
    }

    public function login()
    {
        return view('user.login');
    }

    //登录帐号
    public function store(Request $request)
    {
        $this->validate($request, [
            'account'  => 'required',
            'password' => 'required',
        ], ['account.required' => '登录帐号不能为空', 'password.required' => '密码不能为空']);
        if (filter_var($request['account'], FILTER_VALIDATE_EMAIL)) {
            $data['email'] = $request['account'];
        } else {
            $data['mobile'] = $request['account'];
        }
        $data['password'] = $request['password'];
        if (\Auth::attempt($data, $request['remember'])) {
            return redirect('/')->with('success', '帐号登录成功');
        }
        return back()->with('error', '登录失败，请检查帐号或密码');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
