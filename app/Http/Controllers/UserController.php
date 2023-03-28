<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Activity;
use App\Models\User;
use App\Rules\CodeRule;
use App\Rules\PhoneRule;
use Auth;
use F9Web\ApiResponseHelpers;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['show', 'accountsIsExists']);
    }

    //获取当前用户资料
    public function current()
    {
        return $this->respondWithSuccess(new UserResource(Auth::user()->makeVisible(['address', 'mobile', 'real_name', 'openid', 'unionid'])));
    }

    public function index()
    {
        return UserResource::collection(User::paginate(10));
    }

    public function show(User $user)
    {
        return $this->respondWithSuccess(new UserResource($user));
    }

    public function update(UpdateUserRequest $request)
    {
        $user = Auth::user();
        $user->fill($request->input())->save();
        return $this->respondOk('资料修改成功');
    }

    public function password(Request $request)
    {
        Validator::make($request->input(), [
            'password' => ['required', 'min:5', 'confirmed'],
            'password_confirmation' => ['required', 'min:5'],
        ])->validate();

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return $this->respondOk('密码修改成功');
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
        return $this->respondOk('邮箱绑定成功');
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
        return $this->respondOk('手机绑定成功');
    }

    //注销帐号
    public function delete()
    {
        Auth::user()->delete();
        return $this->respondOk('帐号注销成功');
    }

    //删除头像
    public function removeAvatar(User $user)
    {
        if (!isAdministrator()) return;
        $user->avatar = null;
        $user->save();
        return $this->respondOk('头像删除成功');
    }

    //锁定用户
    public function lockUser(User $user)
    {
        if (!isAdministrator()) return;
        $user->is_lock = true;
        $user->save();
        return $this->respondOk('用户锁定成功');
    }

    public function removeAllData(User $user)
    {
        if (!isAdministrator()) return;
        $user->topics()->delete();
        $user->signs()->delete();
        Activity::where('causer_id', $user->id)->delete();
        $user->is_lock = true;
        $user->save();
        return $this->respondOk('数据清空完毕');
    }
}
