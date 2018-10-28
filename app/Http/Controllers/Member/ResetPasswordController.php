<?php

namespace App\Http\Controllers\Member;

use App\Http\Requests\FindPasswordRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Servers\CodeServer;
use App\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    //找回密码
    public function show()
    {
        return view('member.password_reset');
    }

    /**
     * 更新找回密码
     * @param PasswordResetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PasswordResetRequest $request, User $user)
    {
        //邮箱或手机号
        $session = session()->get('validate_code');
        $user = $user->getUserByAccount($session['username']);
        $user['password'] = bcrypt($request['password']);
        $user->save();
        return redirect(route('login'))->with('success', '密码重置成功');
    }

    /**
     * 发送验证码
     * @param Request $request
     * @param CodeServer $codeServer
     * @param User $user
     * @return array
     * @throws \App\Exceptions\ValidException
     */
    public function code(Request $request, CodeServer $codeServer, User $user)
    {
        if (!$user->getUserByAccount($request['username'])) {
            return ['code' => 403, 'message' => '帐号不存在'];
        }
        $codeServer->send($request['username']);
        return ['code' => 0, 'message' => '验证码发送成功'];
    }
}
