<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\ApiController;
use App\Rules\CodeRule;
use App\Services\CodeService;
use App\Services\UserService;
use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

/**
 * 登录注册相关
 * @package App\Http\Controllers\Member
 */
class UserController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('login', 'register', 'has', 'findPassword');
    }
    /**
     * 获取用户资料
     * @return Authenticatable|null
     */
    public function get()
    {
        return Auth::user();
    }
    /**
     * 接口登录
     * @param Request $request
     */
    public function login(Request $request, UserService $userService)
    {
        $request->validate([
            'account' => "required",
            'password' => 'required',
            'captcha' => ['sometimes', 'required', 'captcha']
        ], ['account.required' => '用户名不能为空', 'password.required' => "密码不能为空", "captcha.required" => '验证码不能为空', 'captcha.captcha' => '验证码输入错误']);
        if ($token = $userService->login($request->all())) {
            return response()->json(['token' => $token]);
        } else {
            return $this->error('帐号或密码错误');
        }
    }

    /**
     * 退出登录
     * @return Redirector|RedirectResponse
     */
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return $this->success('退出成功');
    }

    /**
     * 注册储存
     * @param Request $request
     * @param User $user
     * @return Redirector|RedirectResponse
     * @throws JsonEncodingException
     * @throws MassAssignmentException
     */
    public function register(Request $request, User $user, UserService $userService, CodeService $codeService)
    {
        $column = filter_var($request->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $request->validate([
            'account' => "required|unique:users,{$column}",
            'code' => 'required',
            'name' => 'required',
            'password' => 'required|min:5,20|confirmed',
            'captcha' => 'captcha'
        ], [
            'account.required' => '帐号不能为空', 'account.unique' => '帐号已经注册过',
            'code.required' => '验证码不能为空',
            'name.required' => '昵称不能为空', 'password.required' => '密码不能为空', 'password.min' => '密码长度为5~20', 'password.confirmed' => '两次密码输入不一致', 'captcha.captcha' => '图形验证码输入错误'
        ]);
        if (!$codeService->check($request->account, $request->code)) {
            return abort(422, '验证码输入错误');
        }

        $token = $userService->register($request->all());
        return response()->json(['token' => $token]);
    }
    /**
     * 检测帐号是否存在
     * @param Request $request
     * @return JsonResponse
     */
    public function has(Request $request)
    {
        $column = filter_var($request->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $has = (bool) User::where($column, $request->account)->first();
        return $this->json(['state' => $has]);
    }

    public function findPassword(Request $request,  CodeService $codeService, UserService $userService)
    {
        $request->validate([
            'account' => "required",
            'code' => ['required', new CodeRule($request->account)],
            'password' => 'required|confirmed|min:5,20',
            'captcha' => 'captcha'
        ], [
            'account.required' => '帐号不能为空', 'code' => '验证码不能为空', 'password' => '请输入密码', 'password.confirmed' => '确认密码输入错误', 'password.min' => "请输入长度为5~20位的密码",
            "captcha.captcha" => "图形验证码输入错误"
        ]);
        if ($codeService->check($request->account, $request->code) === false) {
            return abort(422, '验证码输入错误');
        }
        $userService->changePassword($request->account, $request->password);
        return $this->success('密码修改成功');
    }
}
