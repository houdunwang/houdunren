<?php

namespace App\Api\User;

use App\Http\Controllers\Controller;
use App\Rules\AccountRule;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Rules\CodeRule;
use Illuminate\Validation\Rule;
use UserService;

/**
 * 帐号登录注册管理
 * @package App\Api\User
 */
class AuthController extends Controller
{
    /**
     * 帐号登录
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $request->validate([
            'account' => ['required', new AccountRule(request('account')), Rule::exists('users', UserService::account())],
            'password' => ['required'],
            // 'captcha' => ['required', 'captcha_api:' . request('captcha_key')]
        ], [
            'account' => '帐号不能为空',
            'account.exists' => '帐号不存在',
            'password.required' => '密码不能为空',
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '验证码输入错误'
        ]);

        $isLogin = Auth::attempt([
            UserService::account() => $request->account,
            'password' => $request->password
        ], $request->remember);

        if ($isLogin) {
            return ['message' => '登录成功', 'token' => $this->token(Auth::user())];
        }
        return response(['message' => '帐号或密码错误'], 401);
    }


    /**
     * 注册帐号
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request, User $user)
    {
        $request->validate([
            'account' => ['required', new AccountRule(request('account')), Rule::unique('users', 'mobile')],
            'password' => ['required', 'confirmed', 'between:5,20'],
            'code' => ['required', new CodeRule(request('account'))]
        ], ['account.required' => '帐号不能为空', 'account.unique' => '手机号已经注册', 'password.required' => '密码不能为空', 'code.required' => '验证码不能为空']);

        $user->password = Hash::make($request->password);
        $user->mobile = $request->account;
        $user->save();
        return ['message' => '注册成功', 'token' => $this->token($user)];
    }

    /**
     * 获取令牌
     *
     * @param User $user
     * @return void
     */
    protected function token(User $user)
    {
        return $user->createToken('auth')->plainTextToken;
    }

    /**
     * 找回密码
     *
     * @param Request $request
     * @return void
     */
    public function forget(Request $request, User $user)
    {
        $request->validate([
            'account' => ['required', new AccountRule(request('account')), Rule::unique('users', 'mobile')],
            'password' => ['required', 'confirmed', 'between:5,20'],
            'code' => ['required', new CodeRule(request('account'))]
        ], ['account.required' => '帐号不能为空', 'account.unique' => '手机号已经注册', 'password.required' => '密码不能为空', 'code.required' => '验证码不能为空']);

        $user = User::where(UserService::account(), $request->account)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return ['message' => '密码重置成功', 'token' => $this->token($user)];
    }
}
