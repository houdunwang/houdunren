<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Rules\CodeRule;
use App\Rules\PhoneRule;
use Auth;
use Cache;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Spatie\Activitylog\Models\Activity;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['show', 'accountsIsExists', 'current']);
    }

    public function current()
    {
        if (Auth::check())
            return new UserResource(Auth::user()->makeVisible(['address', 'mobile', 'real_name', 'openid', 'unionid'])
                ->load(['duration' => function ($query) {
                    $query->where('end_time', '>', now());
                }]));
    }

    public function info(User $user)
    {
        return new UserResource($user->makeVisible(['address', 'real_name', 'mobile']));
    }

    public function index()
    {
        return UserResource::collection(User::paginate(10));
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request)
    {
        $user = Auth::user();
        $user->fill($request->input())->save();
        return $this->success('资料修改成功', $user->fresh());
    }

    public function password(Request $request)
    {
        Validator::make($request->input(), [
            'password' => ['required', 'min:5', 'confirmed']
        ])->validate();

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return $this->success('密码修改成功');
    }

    public function email(Request $request)
    {
        Validator::make($request->input(), [
            'account' => ['required', 'email',],
            'code' => ['required', new CodeRule('account')]
        ], ['account.required' => '邮箱不能为空', 'account.email' => '邮箱格式错误'])->validate();

        if (User::where('email', $request->account)->exists()) {
            throw ValidationException::withMessages(['account' => '邮箱已被使用']);
        }

        $user = Auth::user();
        $user->email = $request->account;
        $user->save();
        return $this->success('邮箱绑定成功');
    }

    public function mobile(Request $request)
    {
        Validator::make($request->input(), [
            'account' => ['required', new PhoneRule(),],
            'code' => ['required', new CodeRule('account')]
        ], ['account.required' => '手机号不能为空'])->validate();

        if (User::where('mobile', $request->account)->exists()) {
            throw ValidationException::withMessages(['account' => '邮箱已被使用']);
        }

        $user = Auth::user();
        $user->mobile = $request->account;
        $user->save();
        return $this->success('手机绑定成功');
    }

    public function accountsIsExists(Request $request)
    {
        $state = User::where('email', $request->account)->orWhere('mobile', $request->account)->exists();

        return $this->success(data: $state);
    }

    //注销帐号
    public function delete()
    {
        if (Auth::user()->orders()->where('pay_state', 1)->exists()) {
            return $this->error('有支付记录不允许删除');
        }
        Auth::guard('web')->logout();
        Auth::user()->delete();
        return $this->success('帐号注销成功');
    }

    //删除头像
    public function removeAvatar(User $user)
    {
        if (!isAdministrator()) return;
        $user->avatar = null;
        $user->save();
        return $this->success('头像删除成功');
    }

    public function lockUser(User $user)
    {
        if (!isAdministrator()) return;
        $user->is_lock = true;
        $user->save();
        return $this->success('用户锁定成功');
    }
}
