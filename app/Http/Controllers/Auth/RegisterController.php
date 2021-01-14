<?php

namespace App\Http\Controllers\Auth;

use App\Rules\CodeRule;
use App\Services\CodeService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Rules\AccountRule;
use App\Services\UserService;

/**
 * 会员登录
 */
class RegisterController extends Controller
{
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
    public function register(Request $request, User $user, UserService $userService)
    {
        $request->validate(
            [
                'account' => ['required', Rule::unique('users', 'mobile'), new AccountRule(request('account'))],
                'code' => ['required', new CodeRule($request->account)],
                'password' => ['required', 'between:5,20', 'confirmed'],
            ],
            [
                'account.required' => '帐号不能为空', 'account.unique' => '帐号已经存在',
                'code.required' => '验证码不能为空',
                'password.required' => '密码不能为空', 'password.between' => '密码长度为5～20个字符', 'password.confirmed' => '两次密码输入不一致'
            ]
        );

        $user->password = $request->password;
        $user[$userService->account()] = $request->account;
        $user->save();

        Auth::login($user);

        return inertia()->location('/');
    }

    /**
     * 发送验证码
     *
     * @param Request $request
     * @param UserService $userService
     * @return void
     */
    public function code(Request $request, UserService $userService)
    {
        $userExists = (User::where($userService->account(), request('account')))->exists();
        if ($userExists) {
            return back()->with('error', '用户已经存在');
        }

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
