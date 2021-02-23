<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\AccountRule;
use App\Rules\CodeRule;
use App\Models\User;
use UserService;
use Auth;
use Hash;
use Exception;
use RuntimeException;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * 帐号登录注册管理
 * @package App\Api\User
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['logout']);
        $this->middleware(['site'])->except(['login']);
    }

    /**
     * 帐号登录
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $request->validate([
            'account' => ['required', Rule::exists('users', UserService::account()), new AccountRule(request('account'))],
            'password' => ['required'],
            'captcha.content' => ['sometimes', 'required', 'captcha_api:' . request('captcha.key') . ',default']
        ], [
            'account' => '帐号不能为空',
            'account.exists' => '帐号不存在',
            'password.required' => '密码不能为空',
            'captcha.content.required' => '验证码不能为空',
            'captcha.content.captcha_api' => '验证码输入错误'
        ]);

        $isLogin = Auth::attempt([
            UserService::account() => $request->account,
            'password' => $request->password
        ], $request->remember ?? true);

        if ($isLogin) {
            return ['message' => '登录成功', 'token' => $this->token(Auth::user()), 'data' => Auth::user()];
        }
        return response(['message' => '帐号或密码错误'], 405);
    }

    /**
     * 退出登录
     * @return void
     * @throws RuntimeException
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return $this->message('帐号退出成功');
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
            'code' => ['sometimes', 'required', new CodeRule(request('account'))]
        ], [
            'account.required' => '帐号不能为空',
            'account.unique' => '帐号已经被注册',
            'password.required' => '密码不能为空', 'code.required' => '验证码不能为空'
        ]);

        $user->password = Hash::make($request->password);
        $user->mobile = $request->account;
        $user->save();
        return $this->message('注册成功');
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
            'account' => ['required', new AccountRule(request('account')), Rule::exists('users', UserService::account())],
            'password' => ['required', 'confirmed', 'between:5,20'],
            'code' => ['sometimes', 'required', new CodeRule(request('account'))]
        ], [
            'account.required' => '帐号不能为空',
            'account.exists' => '帐号不存在',
            'password.required' => '密码不能为空',
            'code.required' => '验证码不能为空'
        ]);

        $user = User::where(UserService::account(), $request->account)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return ['message' => '密码重置成功', 'token' => $this->token($user)];
    }
}
