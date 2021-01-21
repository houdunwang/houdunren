<?php

namespace App\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UserRequest;
use Hash;

class UserController extends Controller
{
    /**
     * 获取当前登录用户资料
     *
     * @return void
     */
    public function info()
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
}
