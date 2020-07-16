<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index()
    {
        return view('member.password');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:5'],
        ], ['old_password.required' => '原密码不能为空']);

        if (!Hash::check($request->old_password, user("password"))) {
            return back()->with('danger', '旧密码输入错误');
        }

        $user = user();
        $user['password'] = $request->input('password');
        $user->save();

        return back()->with('success', '资料修改成功');
    }
}
