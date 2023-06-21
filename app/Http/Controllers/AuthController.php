<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\CodeRule;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:sanctum')->only('logout');
    }

    //查找用户
    protected function getUser(string $value = null, array $fields = ['name', 'mobile', 'email'])
    {
        if ($value) {
            $query = User::orderByDesc('id');
            foreach ($fields as $field) {
                $query->orWhere($field, $value);
            }
            return $query->first();
        }
    }

    //登录
    public function login(Request $request)
    {
        $user = $this->getUser($request->account);
        Validator::make($request->input(), [
            "account" => ['required', function (string $attribute, mixed $value, Closure $fail) use ($user) {
                if (!$user) $fail('用户不存在');
            }],
            'password' => ['required', function (string $attribute, mixed $value, Closure $fail) use ($user, $request) {
                if ($user && !Hash::check($request->password, $user->password)) {
                    $fail('密码输入错误');
                }
            }],
            'captcha' => [app()->isProduction() ?  'required' : 'nullable', 'captcha_api:' . request('captcha_key') . ',math']
        ], ['captcha.captcha_api' => '验证码输入错误'])->validate();

        // $user->tokens()->delete();
        return $this->respondWithSuccess(['token' => $user->createToken('auth')->plainTextToken, 'user' => $user]);
    }

    /**
     * 用户名注册
     *
     * @param Request $request
     * @param User $user
     */
    public function register(Request $request, User $user)
    {
        Validator::make($request->input(), [
            'account' => ['required', Rule::unique('users', 'name'), 'regex:/^\w+$/i'],
            'password' => ['required', 'confirmed'],
            'captcha' => [app()->isProduction() ? 'required' : 'nullable', 'captcha_api:' . request('captcha_key') . ',math']
        ], [
            'account.require' => '帐号不能为空',
            'account.regex' => '用户名由字母、数字、下划线组成',
            'captcha.captcha_api' => '验证码输入错误'
        ])->validate();
        $user->name = request('account');
        $user->password = Hash::make(request('password'));
        $user->save();
        $user->tokens()->delete();
        return $this->respondWithSuccess(['token' => $user->createToken('auth')->plainTextToken, 'user' => $user]);
    }

    //找回密码
    public function forgotPassword(Request $request)
    {
        $user = $this->getUser($request->account, ['email', 'mobile']);

        Validator::make($request->input(), [
            "account" => ["required", function (string $attribute, mixed $value, Closure $fail) use ($user) {
                if (!$user) $fail('帐号不存在');
            }],
            "code" => ['required', new CodeRule()],
            "password" => ["required", "between:3,20", "confirmed"],
        ], ['code.required' => '验证码不能为空'])->validate();

        $user->password = Hash::make($request->password);
        $user->save();
        $user->tokens()->delete();
        Auth::login($user);

        return $this->respondWithSuccess(['token' => $user->createToken('auth')->plainTextToken]);
    }

    //退出
    public function logout()
    {
        Auth::logout();
        Auth::user()->tokens()->delete();
        return $this->respondOk('退出成功');
    }
}
