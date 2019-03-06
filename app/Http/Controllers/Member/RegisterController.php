<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Member;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 会员注册
 * Class RegisterController
 * @package App\Http\Controllers\Member
 */
class RegisterController extends Controller
{
    public function __construct()
    {
        \site(null, true);
        $this->middleware('guest', ['only' => ['index']]);
    }

    public function index()
    {
        $usersPlaceholder = [
            config_get('user.register_email', '', 'site') ? '邮箱' : '',
            config_get('user.register_mobile', '', 'site') ? '手机号' : '',
        ];
        $usersPlaceholder = empty(array_filter($usersPlaceholder)) ? '请输入邮箱或手机号' :
            "请输入" . trim(implode('或', $usersPlaceholder), '或');
        return view('member.register.index', compact('usersPlaceholder'));
    }

    public function store(Request $request, UserRepository $repository)
    {
        $data = $request->input();
        if (filter_var($data['username'], FILTER_VALIDATE_EMAIL)) {
            $data['email'] = $data['username'];
        }
        if (preg_match('/^1\d{10}$/', $data['username'])) {
            $data['mobile'] = $data['username'];
        }
        $this->validateFormField($data);
        $user = $repository->create($data);
        auth()->login($user);
        return redirect()->intended('home')->with('success', '注册成功');
    }

    /**
     * 表单验证
     * @param array $data
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateFormField(array $data)
    {
        \Validator::make($data, [
            'name' => 'required|min:3|max:30',
            'username' => 'required',
            'email' => 'sometimes|email|unique:users',
            'mobile' => 'sometimes|regex:/^1\d{10}$/|unique:users',
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
            'name.required' => '昵称不能为空',
            'name.min' => '昵称不能小于3个字符',
            'name.max' => '昵称不能超过30个字符',
            'username.required' => '帐号不能为空',
            'email.email' => '邮箱格式错误',
            'email.unique' => '邮箱已经存在',
            'mobile.regex' => '手机号输入错误',
            'password.confirmed' => '确认密码输入错误',
            'password.min' => '密码不能小于5位',
            'password.max' => '密码长度不能超过20位',
        ])->validate();
    }
}
