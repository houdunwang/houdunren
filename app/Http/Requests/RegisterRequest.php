<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Requests;

use App\Servers\CodeServer;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(CodeServer $codeServer)
    {
        return [
            'name' => 'sometimes|required|unique:users',
            'password' => 'required|min:5|confirmed',
            'code' => [
                'sometimes',
                'required',
                function ($attribute, $value, $fail) use ($codeServer) {
                    if (!$codeServer->check(\Request::get('account'), $value)) {
                        return $fail('验证码输入错误');
                    }
                },
            ],
            'account' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        if (User::where('email', $value)->first()) {
                            return $fail('邮箱已经存在');
                        }
                        return true;
                    }
                    if (preg_match('/^\d+$/', $value)) {
                        if (User::where('mobile', $value)->first()) {
                            return $fail('手机号已经存在');
                        }
                        return true;
                    }
                    return $fail('帐号必须是邮箱或手机号');
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '昵称不能为空',
            'name.unique' => '昵称已经存在',
            'code.required' => '验证码不能为空',
            'password.required' => '密码不能为空',
            'password.min' => "密码不能小于5位",
            'password.confirmed' => "两次密码输入不一致",
            'account.required' => '帐号不能为空',
        ];
    }

}
