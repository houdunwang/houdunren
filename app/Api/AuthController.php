<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\AccountRule;
use App\Rules\CodeRule;
use App\Models\User;
use UserService;
use CodeService;
use Auth;
use Hash;
use Exception;

/**
 * 帐号登录注册管理
 * @package App\Api\User
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['front'])->except('login');
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
            return ['message' => '登录成功', 'token' => $this->token(Auth::user())];
        }
        return response(['message' => '帐号或密码错误'], 405);
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
            'account' => ['required', 'regex:/^\d{11}$/', Rule::unique('users', 'mobile')],
            'password' => ['required', 'confirmed', 'between:5,20'],
            'code' => ['required', new CodeRule(request('account'))]
        ], [
            'account.required' => '帐号不能为空', 'account.regex' => '手机号格式错误',
            'account.unique' => '手机号已经注册',
            'password.required' => '密码不能为空', 'code.required' => '验证码不能为空'
        ]);

        $user->password = Hash::make($request->password);
        $user->mobile = $request->account;
        $user->save();
        return ['message' => '注册成功'];
    }

    /**
     * 发送验证码
     * @param Request $request
     * @return void
     */
    public function registerCode(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', 'regex:/^\d{11}$/', Rule::unique('users', 'mobile')],
                // 'captcha.content' => ['required', 'captcha_api:' . request('captcha.key') . ',default']
            ],
            [
                'account.required' => '手机号不能为空',
                'account.regex' => '手机号格式错误',
                'account.unique' => '手机号已经绑定',
                'captcha.content.required' => '验证码不能为空',
                'captcha.content.captcha_api' => '验证码输入错误'
            ]
        );
        try {
            CodeService::mobile(request('account'));
            return ['message' => '验证码发送成功'];
        } catch (Exception $e) {
            return $this->error('短信发送失败，请检查手机号或联系站长', 500);
        }
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
            'code' => ['required', new CodeRule(request('account'))]
        ], ['account.required' => '帐号不能为空', 'account.unique' => '帐号不存在', 'password.required' => '密码不能为空', 'code.required' => '验证码不能为空']);

        $user = User::where(UserService::account(), $request->account)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return ['message' => '密码重置成功', 'token' => $this->token($user)];
    }

    /**
     * 找回密码验证码
     * @param Request $request
     * @return void
     */
    public function forgetCode(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', new AccountRule(request('account')), Rule::exists('users', UserService::account())],
                'captcha.content' => ['required', 'captcha_api:' . request('captcha.key') . ',default']
            ],
            [
                'account.required' => '帐号不能为空', 'account.exists' => '帐号不存在',
                'captcha.content.required' => '验证码不能为空',
                'captcha.content.captcha_api' => '验证码输入错误'
            ]
        );
        CodeService::send(request('account'));
        return ['message' => '验证码发送成功'];
    }
}
