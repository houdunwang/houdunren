<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Controllers\Member;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 找回密码
 * Class FindPasswordController
 * @package App\Http\Controllers\Member
 */
class FindPasswordController extends Controller
{
    public function index()
    {
        $usersPlaceholder = [
            config_get('user.register_email', '', 'site') ? '邮箱' : '',
            config_get('user.register_mobile', '', 'site') ? '手机号' : '',
        ];
        return view('member.findPassword.index', compact('usersPlaceholder'));
    }

    public function store(Request $request)
    {
        $data = $request->input();
        if (filter_var($data['username'], FILTER_VALIDATE_EMAIL)) {
            $data['email'] = $data['username'];
            $user = User::where('email', $data['email'])->first();
        }
        if (preg_match('/^1\d{10}$/', $data['username'])) {
            $data['mobile'] = $data['username'];
            $user = User::where('mobile', $data['mobile'])->first();
        }
        $this->validateFormField($data);
        $user['password'] = bcrypt($data['password']);
        $user->save();
        return redirect(route('login'))->with('success', '密码修改成功');
    }

    /**
     * 表单验证
     * @param array $data
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateFormField(array $data)
    {
        \Validator::make($data, [
            'username' => 'required',
            'email' => 'sometimes|email|exists:users',
            'mobile' => 'sometimes|regex:/^1\d{10}$/|exists:users',
            'password' => 'nullable|confirmed|min:5|max:20',
            'code' => [
                'sometimes',
                function ($attribute, $value, $fail) {
                    $key = session()->getId() . 'code';
                    if ($value != \Cache::get($key)) {
                        $fail('验证码输入错误');
                    }
                },
            ],
        ], [
            'username.required' => '帐号不能为空',
            'email.email' => '邮箱格式错误',
            'email.exists' => '注册邮箱不存在',
            'mobile.regex' => '手机号输入错误',
            'mobile.exists' => '手机号不存在',
            'password.confirmed' => '确认密码输入错误',
            'password.min' => '密码不能小于5位',
            'password.max' => '密码长度不能超过20位',
        ])->validate();
    }
}
