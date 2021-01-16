<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Rules\AccountRule;
use Illuminate\Http\Request;
use CodeService;

/**
 * 发送验证码
 * @package App\Http\Controllers\Common
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
     * @return void
     */
    public function send(Request $request)
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
        CodeService::send(request('account'));

        return back()->with('success', '验证码发送成功');
    }
}
