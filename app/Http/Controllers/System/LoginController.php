<?php

namespace App\Http\Controllers\System;

use App\Repositories\UserRepository;
use App\Servers\UserServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 后台登录
 * Class LoginController
 * @package App\Http\Controllers\System
 */
class LoginController extends Controller
{
    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('system.site.index');
        }
        return view('system.login.login');
    }

    public function store(Request $request, UserServer $server, UserRepository $userRepository)
    {
        if ($server->login($request->only(['username', 'password']))) {
            return redirect()->route('system.site.index');
        }
        return redirect(route('system.login.show'))->with('error', '帐号或密码错误');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('system.login.show')->with('success', '您已成功退出');
    }
}
