<?php

namespace App\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use Auth;

class LoginController extends Controller
{
    /**
     * 帐号登录
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request, UserService $userService)
    {
        $request->validate(
            [
                'password' => 'required',
                'account' => $userService->accountValidateRule(),
                // 'captcha.value' => $userService->captchaValidateRule()
            ],
            ['password.required' => '登录密码不能为空'] + $userService->accountValidateErrors() + $userService->captchaValidateErrors()
        );

        $isLogin = Auth::attempt(
            [$userService->account() => $request->account, 'password' => $request->password]
        );

        if ($isLogin) {
            $token = Auth::user()->createToken('auth');
            return ['message' => '登录成功', 'token' => $token->plainTextToken];
        }
        return response(['message' => '登录失败'], 403);
    }
}
