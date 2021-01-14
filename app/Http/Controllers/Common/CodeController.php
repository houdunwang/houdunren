<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Rules\AccountRule;
use App\Services\CodeService;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * 发送验证码
 */
class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('front');
    }

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
                'account' => ['required', new AccountRule(request('account'))],
                'captcha' => ['required', 'captcha']
            ],
            [
                'account.required' => '帐号不能为空',
                'captcha.required' => '图形验证码不能为空', 'captcha.captcha' => '验证码输入错误'
            ]
        );
        (new CodeService(request('account')))->send();

        return back()->with('success', '验证码发送成功');
    }
}
