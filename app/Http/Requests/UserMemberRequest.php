<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 会员资料修改
 * Class UserMemberRequest
 * @package App\Http\Requests
 */
class UserMemberRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|required|min:3|max:30|unique:users,name,' . auth()->id(),
            'icon' => 'sometimes|required',
            'home' => 'sometimes|url',
            'weibo' => 'sometimes|url',
            'github' => 'sometimes|url',
            'email' => 'sometimes|email|unique:users,email,' . auth()->id(),
            'mobile' => 'sometimes|regex:/^1\d{10}$/|unique:users,mobile,' . auth()->id(),
            'code' => [
                'sometimes',
                'required',
                function ($attribute, $value, $fail) {
                    $key = session()->getId() . 'code';
                    if ($value != \Cache::get($key)) {
                        $fail('验证码输入错误');
                    }
                },
            ],
            'original_password' => [
                function ($attribute, $value, $fail) {
                    if (!\Hash::check($value, auth()->user()->makeVisible('password')['password'])) {
                        $fail('原密码输入错误');
                    }
                },
            ],
            'password' => 'sometimes|confirmed|min:5|max:20',
            'qq' => 'nullable|min:100|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '昵称不能为空',
            'name.min' => '昵称不能少于三个字',
            'name.max' => '昵称不能超过30个字符',
            'name.unique' => '昵称已经被占用',
            'email.email' => '邮箱格式错误',
            'email.unique' => '邮箱已经被占用',
            'mobile.regex' => '手机号格式错误',
            'mobile.unique' => '手机号已经被使用',
            'weibo.url'=>'微博网址错误',
            'home.url'=>'网站地址错误',
            'github.url'=>'GitHub网址错误',
            'code.required' => '验证码不能为空',
            'password.confirmed' => '确认密码输入错误',
            'password.min' => '密码不能小于五位',
            'password.max' => '密码长度不能超过20位',
            'qq.min' => 'QQ号不能小于三位',
            'qq.numeric' => 'QQ号输入错误',
        ];
    }
}
