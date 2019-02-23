<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Servers\UserServer;
use Illuminate\Http\Request;

/**
 * 会员登录
 * Class LoginController
 * @package App\Http\Controllers\Account
 */
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'index']);
    }

    public function index()
    {
        return view('login.create');
    }

    public function store(Request $request, UserServer $server)
    {
        if ($server->login($request->only(['name', 'password']))) {
            return redirect()->intended(route('home'));
        } else {
            return back()->with('error', '帐号或密码错误');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', '您已成功退出');
    }
}
