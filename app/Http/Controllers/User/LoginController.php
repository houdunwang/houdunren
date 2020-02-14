<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 前台登录
 * Class PassportController
 * @package App\Http\Controllers\User
 */
class LoginController extends Controller
{
    /**
     * 用户登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): ?\Illuminate\Http\JsonResponse
    {
        $type = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $credentials = ['password' => $request->password, $type => $request->username];
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('hdcms')->accessToken;
            return response()->json(['access_token' => $token, 'data' => auth()->user()], 200);
        } else {
            return response()->json(['error' => '帐号或密码错误'], 401);
        }
    }
}
