<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PhoneRule;
use App\Services\CodeService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;

/**
 * 发送验证码
 * @package App\Http\Controllers
 */
class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['noExists']);
    }

    //向不存在的帐号发送验证码
    public function noExists(Request $request)
    {
        Validator::make($request->all(), [
            'account' => [
                'required', filter_var($request->account, FILTER_VALIDATE_EMAIL) ? 'email' : new PhoneRule(),
                function ($attribute, $value, $fail) {
                    if (User::where('email', $value)->orWhere('mobile', $value)->exists()) return $fail('帐号已经被使用');
                },
            ],
        ], ['account.required' => "帐号不能为空", 'captcha.captcha_api' => '验证码输入错误'])->validate();

        //验证发送时间间隔
        if (RateLimiter::tooManyAttempts($limiterKey = "send-code:" . Auth::id(), $perMinute = app()->environment('local') ? 100 : 1)) {
            $seconds = RateLimiter::availableIn($limiterKey);
            abort(403, "请 {$seconds} 秒后再试.");
        }

        //限流定义
        RateLimiter::attempt(
            $limiterKey,
            $perMinute,
            function () {
                app(CodeService::class)->send(request('account'));
            }
        );

        return $this->respondOk('验证码发送成功');
    }

    //已经存在的帐号发送验证码
    public function exists(Request $request)
    {
        Validator::make($request->all(), [
            'account' => [
                'required', filter_var($request->account, FILTER_VALIDATE_EMAIL) ? 'email' : new PhoneRule(),
                function ($attribute, $value, $fail) {
                    if (!User::where('email', $value)->orWhere('mobile', $value)->exists()) {
                        $fail('帐号不存在');
                    }
                },
            ],
        ], ['account.required' => "帐号不能为空", 'captcha.captcha_api' => '验证码输入错误'])->validate();

        //验证发送时间间隔
        if (RateLimiter::tooManyAttempts($limiterKey = "send-code:" . request('account'), $perMinute = 1)) {
            $seconds = RateLimiter::availableIn($limiterKey);
            abort(403, "请 {$seconds} 秒后再试.");
        }
        //限流定义
        RateLimiter::attempt(
            $limiterKey,
            $perMinute,
            function () {
                app(CodeService::class)->send(request('account'));
            }
        );

        return $this->respondOk('验证码发送成功');
    }
}
