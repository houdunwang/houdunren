<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\CodeRule;
use App\Http\Resources\UserResource;
use Hash;
use Auth;

/**
 * 用户
 * @package App\Api\User
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * 获取当前用户资料
     *
     * @return void
     */
    public function info()
    {
        return new UserResource(Auth::user());
    }

    /**
     * 修改个人资料
     *
     * @param Request $request
     * @return void
     */
    public function base(UserRequest $request)
    {
        Auth::user()->fill($request->input())->save();

        return ['message' => '修改成功'];
    }

    /**
     * 密码修改
     *
     * @param Request $request
     * @return void
     */
    public function password(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', 'between:5,20'],
        ], ['old_password.required' => '原密码不能为空']);

        if (!Hash::check($request->old_password, $user->password)) {
            return response(['message' => '原密码输入错误'], 403);
        }

        $user['password'] = Hash::make($request->input('password'));
        $user->save();
        return response(['message' => '密码修改成功']);
    }

    /**
     * 修改头像
     *
     * @param Request $request
     * @return void
     */
    public function avatar(Request $request)
    {
        $user = Auth::user();
        $user->avatar = $request->avatar;
        $user->save();
        return ['message' => '头像修改成功'];
    }

    /**
     * 绑定手机号
     *
     * @param Request $request
     * @return void
     */
    public function mobile(Request $request)
    {
        $this->validate($request, [
            'account' => ['required', 'regex:/^\d{11}$/', Rule::unique('users', 'mobile')],
            'code' => ['required', new CodeRule(request('account'))]
        ], ['account.required' => '手机号不能为空', 'account.regex' => '手机号格式错误', 'account.unique' => '手机号已经存在', 'code.required' => '验证码不能为空']);

        $user = Auth::user();
        $user->mobile = $request->account;
        $user->save();
        return ['message' => '手机号绑定成功'];
    }

    /**
     * 为存在的手机发送验证码
     * @param Request $request
     * @return void
     */
    public function mobileCode(Request $request)
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
     *
     * 绑定邮箱
     *
     * @param Request $request
     * @return void
     */
    public function email(Request $request)
    {
        $this->validate($request, [
            'account' => ['required', 'email', Rule::unique('users', 'email')],
            'code' => ['required', new CodeRule(request('account'))]
        ], ['account.required' => '邮箱不能为空', 'account.email' => '邮箱格式错误', 'account.unique' => '邮箱已经存在', 'code.required' => '验证码不能为空']);

        $user = Auth::user();
        $user->email = $request->account;
        $user->save();
        return ['message' => '邮箱绑定成功'];
    }

    /**
     * 为存在的邮箱发送验证码
     * @param Request $request
     * @return void
     */
    public function emailCode(Request $request)
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
}
