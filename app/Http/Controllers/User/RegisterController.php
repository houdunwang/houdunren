<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

/**
 * 前台登录注册
 * Class PassportController
 * @package App\Http\Controllers\User
 */
class RegisterController extends Controller
{
    /**
     * 会员注册
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $type = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $user = User::create([
            $type => $request->username,
            'password' => bcrypt($request->password)
        ]);
        $token = $user->createToken('hdcms')->accessToken;
        return response()->json(['access_token' => $token], 200);
    }
}
