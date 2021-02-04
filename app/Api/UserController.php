<?php

namespace App\Api;

use App\Http\Resources\ModuleResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\OldPassword;
use App\Rules\CodeRule;
use App\Models\User;
use CodeService;
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
        $this->middleware(['front'])->only(['mobileCode', 'emailCode']);
    }

    /**
     * 用户默认组可使用的模块
     *
     * @param User $user
     * @return void
     */
    public function module(User $user)
    {
        $modules = $user->group->modules;
        return ModuleResource::collection($modules->load('packages'));
    }

    /**
     * 用户列表
     * @return void
     */
    public function index()
    {
        $users = User::when(request('keyword'), function ($query) {
            return $query->search(request('keyword'));
        })->paginate(10);
        return UserResource::collection($users);
    }

    /**
     * 当前登录用户
     * @return void
     */
    public function info()
    {
        return new UserResource(Auth::user());
    }

    /**
     * 获取用户资料
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return new UserResource($user);
    }

    /**
     * 更新资料
     *
     * @param UserRequest $request
     * @param User $user
     * @return void
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $user->fill($request->input())->save();
        return ['message' => '资料修改成功'];
    }

    /**
     * 密码修改
     * @param Request $request
     * @return void
     */
    public function password(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'old_password' => ['required', new OldPassword($user)],
            'password' => ['required', 'confirmed', 'between:5,20'],
        ], ['old_password.required' => '原密码不能为空']);

        $user['password'] = Hash::make($request->input('password'));
        $user->save();

        return ['message' => '密码修改成功'];
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
        ], [
            'account.required' => '手机号不能为空', 'account.regex' => '手机号格式错误',
            'account.unique' => '手机号已经绑定', 'code.required' => '验证码不能为空'
        ]);

        $user = Auth::user();
        $user->mobile = $request->account;
        $user->save();
        return ['message' => '手机号绑定成功'];
    }

    /**
     * 发送验证码
     * @param Request $request
     * @return void
     */
    public function mobileCode(Request $request)
    {
        $request->validate(
            [
                'account' => ['required', 'regex:/^\d{11}$/', Rule::unique('users', 'mobile')],
                'captcha.content' => ['required', 'captcha_api:' . request('captcha.key') . ',default']
            ],
            [
                'account.required' => '帐号不能为空',
                'account.regex' => '手机号格式错误',
                'account.unique' => '手机号已经绑定',
                'captcha.content.required' => '验证码不能为空',
                'captcha.content.captcha_api' => '验证码输入错误'
            ]
        );

        CodeService::mobile(request('account'));
        return ['message' => '验证码发送成功'];
    }

    /**
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
        ], [
            'account.required' => '邮箱不能为空', 'account.email' => '邮箱格式错误',
            'account.unique' => '邮箱已经存在', 'code.required' => '验证码不能为空'
        ]);

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
                'account' => ['required', 'email', Rule::unique('users', 'mobile')],
                'captcha.content' => ['required', 'captcha_api:' . request('captcha.key') . ',default']
            ],
            [
                'account.required' => '帐号不能为空',
                'account.unique' => '邮箱已经被使用',
                'captcha.content.required' => '验证码不能为空',
                'captcha.content.captcha_api' => '验证码输入错误'
            ]
        );

        CodeService::email(request('account'));
        return ['message' => '验证码发送成功'];
    }
}
