<?php

namespace App\Api\Common;

use App\Http\Controllers\Controller;
use App\Rules\AccountRule;
use Illuminate\Http\Request;
use CodeService;
use UserService;
use Illuminate\Validation\Rule;

/**
 * 发送验证码
 * @package App\Http\Controllers\Common
 */
class CodeController extends Controller
{
    /**
     * 发送邮箱或手机验证码
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
        return ['message' => '验证码发送成功'];
    }

    /**
     * 为存在的邮箱发送验证码
     * @param Request $request
     * @return void
     */
    public function accountExist(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', new AccountRule(request('account')), Rule::exists('users', UserService::account())],
                'captcha' => ['required', 'captcha']
            ],
            [
                'account.required' => '帐号不能为空', 'account.exists' => '帐号不存在',
                'captcha.required' => '图形验证码不能为空', 'captcha.captcha' => '验证码输入错误'
            ]
        );

        CodeService::email(request('account'));
        return ['message' => '验证码发送成功'];
    }

    /**
     * 为存在的邮箱发送验证码
     * @param Request $request
     * @return void
     */
    public function email(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', 'email', Rule::exists('users', 'email')],
                'captcha' => ['required', 'captcha']
            ],
            [
                'account.required' => '帐号不能为空', 'account.exists' => '邮箱不存在',
                'captcha.required' => '图形验证码不能为空', 'captcha.captcha' => '验证码输入错误'
            ]
        );

        CodeService::email(request('account'));
        return ['message' => '验证码发送成功'];
    }

    /**
     * 为不存在的邮箱发送验证码
     *
     * @param Request $request
     * @return void
     */
    public function noExistEmail(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', 'email', Rule::unique('users', 'email')],
                'captcha' => ['required', 'captcha']
            ],
            [
                'account.required' => '帐号不能为空', 'account.unique' => '邮箱已经存在',
                'captcha.required' => '图形验证码不能为空', 'captcha.captcha' => '验证码输入错误'
            ]
        );

        CodeService::email(request('account'));
        return ['message' => '验证码发送成功'];
    }

    /**
     * 为存在的手机发送验证码
     * @param Request $request
     * @return void
     */
    public function mobile(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', 'regex:/^\d{11}$/', Rule::exists('users', 'mobile')],
                'captcha' => ['required', 'captcha']
            ],
            [
                'account.required' => '帐号不能为空', 'account.regex' => '手机号格式错误', 'account.exists' => '手机号不存在',
                'captcha.required' => '图形验证码不能为空', 'captcha.captcha' => '验证码输入错误'
            ]
        );

        CodeService::mobile(request('account'));
        return ['message' => '验证码发送成功'];
    }


    /**
     * 为不存在的手机发送验证码
     * @param Request $request
     * @return void
     */
    public function noExistMobile(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', 'regex:/^\d{11}$/', Rule::unique('users', 'mobile')],
                'captcha' => ['required', 'captcha']
            ],
            [
                'account.required' => '帐号不能为空', 'account.regex' => '手机号格式错误', 'account.unique' => '手机号已经存在',
                'captcha.required' => '图形验证码不能为空', 'captcha.captcha' => '验证码输入错误'
            ]
        );

        CodeService::mobile(request('account'));
        return ['message' => '验证码发送成功'];
    }
}
