<?php

namespace App\Http\Controllers\Auth;

use App\Rules\VerificationCodeRule;
use App\Services\CodeService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

/**
 * 会员登录
 */
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest', 'front']);
    }

    /**
     * 登录界面
     *
     * @param Request $request
     * @return void
     */
    public function show(Request $request)
    {
        return inertia('Auth/Register/Show');
    }

    /**
     * 保存数据
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function register(Request $request, User $user)
    {
        $request->validate(
            [
                'account' => ['required', 'regex:/1\d{10}/i', Rule::unique('users', 'mobile')],
                'code' => ['required', new VerificationCodeRule($request->account)],
                'password' => ['required', 'min:5', 'confirmed'],
            ],
            ['code.required' => '验证码不能为空', 'account.regex' => '手机号格式错误']
        );

        $user->password = $request->password;
        $user->mobile = $request->account;
        $user->save();

        Auth::login($user);
        $url = $request->session()->pull('url.intended', '/');
        return response()->json(['message' => '注册成功', 'url' => $url]);
    }

    /**
     * 发送验证码
     *
     * @param Request $request
     * @param CodeService $codeService
     * @return void
     */
    public function code(Request $request, CodeService $codeService)
    {
        $request->validate(
            [
                'account' => ['required', 'regex:/^1\d{10}$/', Rule::unique('users', 'mobile')],
                'captcha' => ['required', 'captcha'],
            ],
            ['code.required' => '验证码不能为空', 'mobile.regex' => '手机格式错误', 'mobile.unique' => '手机号已经使用']
        );

        $codeService->mobile($request->account);

        return response()->json(['message' => '验证码发送成功']);
    }
}
