<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\CodeRule;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //登录
    public function login(Request $request)
    {
        Validator::make($request->input(), [
            "account" => ['required', Rule::exists('users', $this->accountField())],
            'password' => ['required'],
            'captcha' => [app()->isLocal() ? 'nullable' : 'required', 'captcha_api:' . request('captcha_key') . ',math']
        ], ['captcha.captcha_api' => '验证码输入错误'])->validate();

        $user = User::where($this->accountField(), $request->account)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            return $this->respondWithSuccess(['token' => $user->createToken('auth')->plainTextToken, 'user' => $user]);
        }
        throw ValidationException::withMessages(['password' => '密码输入错误']);
    }

    public function register(Request $request, User $user)
    {
        Validator::make($request->input(), [
            'account' => ['required', Rule::unique('users', 'name')],
            'password' => ['required', 'confirmed'],
            'captcha' => ['required', 'captcha_api:' . request('captcha_key') . ',math']
        ], [
            'name.require' => '帐号不能为空',
            'captcha.captcha_api' => '验证码输入错误'
        ])->validate();
        $user->name = request('account');
        $user->password = Hash::make(request('password'));
        $user->save();
        return $this->respondWithSuccess(['token' => $user->createToken('auth')->plainTextToken, 'user' => $user]);
    }

    public function logout()
    {
        Auth::logout();
        return $this->respondOk('退出成功');
    }

    protected function accountField()
    {
        return filter_var(request('account'), FILTER_VALIDATE_EMAIL) ? "email" : "mobile";
    }

    //找回密码
    public function forgotPassword(Request $request)
    {
        Validator::make($request->input(), [
            "account" => ["required", Rule::exists('users', $this->accountField())],
            "code" => ['required', new CodeRule()],
            "password" => ["required", "between:3,20", "confirmed"],
        ], ['code.required' => '验证码不能为空'])->validate();

        $user = User::where($this->accountField(), $request->account)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return $this->respondWithSuccess(['token' => $user->createToken('auth')->plainTextToken]);
    }
}
