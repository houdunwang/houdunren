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

use App\Http\Requests\RegisterRequest;
use App\Servers\CodeServer;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('member.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->all();
        if (filter_var($request['account'], FILTER_VALIDATE_EMAIL)) {
            $data['email'] = $request['account'];
            $data['email_verified_at'] = new Carbon();
        } else {
            $data['mobile'] = $request['account'];
            $data['mobile_verified_at'] = new Carbon();
        }
        $data['password'] = bcrypt($request['password']);
        if (User::create($data)) {
            return redirect(route('login'))->with('success', '帐号注册成功');
        }
        return back()->with('error', '注册失败');
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
        if ($user->getUserByAccount($request['username'])) {
            return ['code' => 403, 'message' => '帐号已经存在'];
        }
        $codeServer->send($request['username']);
        return ['code' => 0, 'message' => '验证码发送成功'];
    }
}
