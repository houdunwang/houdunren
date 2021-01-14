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

        return inertia()->location('/')->with('success', '注册成功');
    }
}
