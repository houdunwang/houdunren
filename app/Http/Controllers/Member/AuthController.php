<?php

namespace App\Http\Controllers\Member;


use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\AccountRule;
use UserService;
use Auth;

/**
 * 会员登录
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
        $this->middleware('auth:sanctum')->only('logout');
    }

    /**
     * 登录界面
     * @return void
     */
    public function login()
    {
        return inertia('Auth/Login');
    }

    /**
     * 找回密码
     * @return void
     */
    public function forget()
    {
        return inertia('Auth/Forget');
    }

    /**
     * 退出登录
     * @return void
     */
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    /**
     * 登录界面
     * @return void
     */
    public function register()
    {
        return inertia('Auth/Register');
    }
}
