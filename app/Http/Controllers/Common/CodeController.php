<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Services\CodeService;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * 发送验证码
 */
class CodeController extends Controller
{
    /**
     * 发送验证码
     *
     * @param Request $request
     * @param CodeService $codeService
     * @param UserService $userService
     * @return void
     */
    public function send(Request $request, CodeService $codeService, UserService $userService)
    {
        $request->validate(
            [
                'account' => ['required', $userService->accountValidateRule()],
                // 'captcha.value' => ['required', $userService->captchaValidateRule()]
            ],
            ['account.required' => '帐号不能为空'] + $userService->accountValidateErrors() + $userService->captchaValidateErrors()
        );

        $codeService->send($request->account);

        return response()->json(['message' => '验证码发送成功']);
    }
}
