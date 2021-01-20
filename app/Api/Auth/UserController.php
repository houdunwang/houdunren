<?php

namespace App\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

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
    public function base(Request $request)
    {
        Auth::user()->fill($request->input())->save();

        return ['message' => '修改成功'];
    }
}
