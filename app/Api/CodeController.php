<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CodeService;
use Auth;
use Exception;
use Illuminate\Validation\Rule;

/**
 * 发送验证码
 * @package App\Api
 */
class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['mobile', 'email']);
        $this->middleware(['site']);
    }

    /**
     * 当前用户手机验证码
     * @param Request $request
     * @return void
     */
    public function mobile(Request $request)
    {
        $request->validate(
            [
                'captcha.content' => ['sometimes', 'required', 'captcha_api:' . request('captcha.key') . ',default']
            ],
            [
                'captcha.content.required' => '验证码不能为空',
                'captcha.content.captcha_api' => '验证码输入错误'
            ]
        );
        try {
            CodeService::mobile(Auth::user()->mobile);
            return ['message' => '验证码发送成功'];
        } catch (Exception $e) {
            return $this->error('短信发送失败，请检查手机号或联系站长', 500);
        }
    }

    /**
     * 发送数据库不存在的手机号验证码
     * @param Request $request
     * @return void
     */
    public function existMobile(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', 'regex:/^\d{11}$/', Rule::exists('users', 'mobile')],
                'captcha.content' => ['sometimes', 'required', 'captcha_api:' . request('captcha.key') . ',default']
            ],
            [
                'account.required' => '帐号不能为空',
                'account.regex' => '手机号格式错误',
                'account.unique' => '手机号已经绑定',
                'captcha.content.required' => '验证码不能为空',
                'captcha.content.captcha_api' => '验证码输入错误'
            ]
        );
        CodeService::mobile(request('account'));
        return $this->message('验证码发送成功');
    }

    /**
     * 发送数据库不存在的手机号验证码
     * @param Request $request
     * @return void
     */
    public function noExistMobile(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', 'regex:/^\d{11}$/', Rule::unique('users', 'mobile')],
                'captcha.content' => ['sometimes', 'required', 'captcha_api:' . request('captcha.key') . ',default']
            ],
            [
                'account.required' => '帐号不能为空',
                'account.regex' => '手机号格式错误',
                'account.unique' => '手机号已经绑定',
                'captcha.content.required' => '验证码不能为空',
                'captcha.content.captcha_api' => '验证码输入错误'
            ]
        );
        CodeService::mobile(request('account'));
        return $this->message('验证码发送成功');
    }

    /**
     * 当前用户发送邮件
     * @param Request $request
     * @param Site $site
     * @return void
     */
    public function email(Request $request)
    {
        $request->validate(
            [
                'captcha.content' => ['sometimes', 'required', 'captcha_api:' . request('captcha.key') . ',default']
            ],
            [
                'captcha.content.required' => '验证码不能为空',
                'captcha.content.captcha_api' => '验证码输入错误'
            ]
        );

        try {
            CodeService::email(Auth::user()->email);
            return $this->message('验证码发送成功');
        } catch (Exception $e) {
            return $this->error('邮件发送失败，可能是邮箱错误或发送频繁。' . $e->getMessage(), 500);
        }
    }

    /**
     * 为存在的邮箱发送验证码
     * @param Request $request
     * @return void
     */
    public function existEmail(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', 'email', Rule::exists('users', 'email')],
                'captcha.content' => ['sometimes', 'required', 'captcha_api:' . request('captcha.key') . ',default']
            ],
            [
                'account.required' => '帐号不能为空',
                'account.unique' => '邮箱已经被使用',
                'captcha.content.required' => '验证码不能为空',
                'captcha.content.captcha_api' => '验证码输入错误'
            ]
        );

        CodeService::email(request('account'));
        return $this->message('验证码发送成功');
    }

    /**
     * 为不存在的邮箱发送验证码
     * @param Request $request
     * @return void
     */
    public function noExistEmail(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', 'email', Rule::unique('users', 'email')],
                'captcha.content' => ['sometimes', 'required', 'captcha_api:' . request('captcha.key') . ',default']
            ],
            [
                'account.required' => '帐号不能为空',
                'account.unique' => '邮箱已经被使用',
                'captcha.content.required' => '验证码不能为空',
                'captcha.content.captcha_api' => '验证码输入错误'
            ]
        );

        CodeService::email(request('account'));
        return $this->message('验证码发送成功');
    }
}
