<?php

namespace App\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UserRequest;
use App\Rules\CodeRule;
use Hash;
use App\Rules\MobileNotExistRule;
use App\Rules\EmailNotExitRule;
use App\Models\User;

/**
 * 用户个人资料
 * @package App\Api\User
 */
class InfoController extends Controller
{
    /**
     * 获取当前用户资料
     *
     * @return void
     */
    public function get()
    {
        return Auth::user();
    }

    /**
     * 修改个人资料
     *
     * @param Request $request
     * @return void
     */
    public function base(UserRequest $request)
    {
        Auth::user()->fill($request->input())->save();

        return ['message' => '修改成功'];
    }

    /**
     * 密码修改
     *
     * @param Request $request
     * @return void
     */
    public function password(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', 'between:5,20'],
        ], ['old_password.required' => '原密码不能为空']);

        if (!Hash::check($request->old_password, $user->password)) {
            return response(['message' => '原密码输入错误'], 403);
        }

        $user['password'] = Hash::make($request->input('password'));
        $user->save();
        return response(['message' => '密码修改成功']);
    }

    /**
     * 修改头像
     *
     * @param Request $request
     * @return void
     */
    public function avatar(Request $request)
    {
        $user = Auth::user();
        $user->avatar = $request->avatar;
        $user->save();
        return ['message' => '头像修改成功'];
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
            'account' => ['required', 'regex:/^\d{11}$/', new MobileNotExistRule(request('account'))],
            'code' => ['required', new CodeRule(request('account'))]
        ], ['account.required' => '手机号不能为空', 'account.regex' => '手机号格式错误', 'code.required' => '验证码不能为空']);

        $user = Auth::user();
        $user->mobile = $request->account;
        $user->save();
        return ['message' => '手机号绑定成功'];
    }
    /**
     *
     * 绑定邮箱
     *
     * @param Request $request
     * @return void
     */
    public function email(Request $request)
    {
        $this->validate($request, [
            'account' => ['required', 'email', new EmailNotExitRule(request('account'))],
            'code' => ['required', new CodeRule(request('account'))]
        ], ['account.required' => '邮箱不能为空', 'account.email' => '邮箱格式错误', 'code.required' => '验证码不能为空']);

        $user = Auth::user();
        $user->email = $request->account;
        $user->save();
        return ['message' => '邮箱绑定成功'];
    }
}
