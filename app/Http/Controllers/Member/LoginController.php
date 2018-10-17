<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\FindPasswordRequest;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['logout']]);
        $this->middleware('guest', ['only' => ['login', 'store']]);
    }

    public function login()
    {
        return view('user.login');
    }

    //登录帐号
    public function store(Request $request)
    {
        $this->validate($request, [
            'account'  => 'required',
            'password' => 'required',
        ], ['account.required' => '登录帐号不能为空', 'password.required' => '密码不能为空']);
        if (filter_var($request['account'], FILTER_VALIDATE_EMAIL)) {
            $data['email'] = $request['account'];
        } else {
            $data['mobile'] = $request['account'];
        }
        $data['password'] = $request['password'];
        if (\Auth::attempt($data, $request['remember'])) {
            return redirect('/')->with('success', '帐号登录成功');
        }
        return back()->with('error', '登录失败，请检查帐号或密码');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }

    //找回密码
    public function findPassword()
    {
        return view('user.findpassword');
    }

    /**
     * 更新找回密码
     * @param FindPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(FindPasswordRequest $request)
    {
        //邮箱或手机号
        $session = session()->get('validate_code');
        $user = User::where([$session['type'] => $session['username']])->first();
        if ($user) {
            $user['password'] = bcrypt($request['password']);
            $user->save();
            return redirect(route('login'))->with('success', '密码重置成功');
        }
        return back()->with('error', '帐号不存在');
    }
}
