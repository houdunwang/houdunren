<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CodeService;
use Auth;
use Exception;

/**
 * 发送验证码
 * @package App\Api
 */
class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum',  'throttle:codeSend']);
    }

    /**
     * 手机验证码
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
     * 邮件发送测试
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
}
