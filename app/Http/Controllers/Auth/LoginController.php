<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
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
    public function login(Request $request, UserService $userService)
    {
        $isLogin = Auth::attempt([
            $userService->account() => $request->account,
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
