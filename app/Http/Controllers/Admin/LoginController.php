<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class LoginController extends ApiController
{
    /**
     * 后台登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): ?\Illuminate\Http\JsonResponse
    {
        $credentials = [];
        $type = filter_var($request['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $credentials['password'] = $request['password'];
        $credentials[$type] = $request['username'];
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('hdcms')->accessToken;
            return response()->json(['access_token' => $token, 'data' => $user], 200);
        } else {
            return $this->error('帐号或密码错误');
        }
    }
}
