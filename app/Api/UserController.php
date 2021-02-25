<?php

namespace App\Api;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Contracts\Container\BindingResolutionException;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\OldPassword;
use App\Rules\CodeRule;
use App\Models\User;
use App\Models\Site;
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
        $this->middleware(['auth:sanctum'])->except(['show']);
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * 当前用户资料
     * @return UserResource
     */
    public function info()
    {
        return new UserResource(Auth::user());
    }

    /**
     * 用户列表
     * @return void
     */
    public function index()
    {
        $users = User::paginate(10);
        return  UserResource::collection($users);
    }

    /**
     * 获取用户资料
     * @param User $user
     * @return void
     */
    public function show(Site $site, User $user)
    {
        return new UserResource($user);
    }

    /**
     * 搜索用户
     * @return AnonymousResourceCollection
     * @throws BindingResolutionException
     */
    public function search()
    {
        $keyword = request('keyword');
        $users = User::when($keyword, function ($query) use ($keyword) {
            return $query->where('id', $keyword)
                ->orWhere('email', 'like', "%{$keyword}%")
                ->orWhere('mobile', 'like', "%{$keyword}%");
        })->with('group')->paginate(10);
        return UserResource::collection($users);
    }



    /**
     * 更新资料
     *
     * @param UserRequest $request
     * @param User $user
     * @return void
     */
    public function update(UserRequest $request, Site $site, User $user)
    {
        $this->authorize('update', $user);
        $user->fill($request->input())->save();
        return $this->message('资料修改成功', $user);
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
            'code' => ['sometimes', 'required', new CodeRule(request('account'))]
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
     * 绑定邮箱
     *
     * @param Request $request
     * @return void
     */
    public function email(Request $request)
    {
        $this->validate($request, [
            'account' => ['required', 'email', Rule::unique('users', 'email')],
            'code' => ['sometimes', 'required', new CodeRule(request('account'))]
        ], [
            'account.required' => '邮箱不能为空', 'account.email' => '邮箱格式错误',
            'account.unique' => '邮箱已经存在', 'code.required' => '验证码不能为空'
        ]);

        $user = Auth::user();
        $user->email = $request->account;
        $user->save();
        return ['message' => '邮箱绑定成功'];
    }
}
