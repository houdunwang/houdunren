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

class PasswordResetRequest extends FormRequest
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
    public function rules(CodeServer $codeServer, User $user)
    {
        return [
            'password' => 'required|min:5|confirmed',
            'code' => [
                'required',
                function ($attribute, $value, $fail) use ($codeServer) {
                    if (!$codeServer->check(\Request::get('account'), $value)) {
                        return $fail('验证码输入错误');
                    }
                },
            ],
            'account' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!$user->getUserByAccount($value)) {
                        return $fail('帐号不存在');
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '昵称 不能为空',
            'code.required' => '验证码 不能为空',
            'password.required' => '密码 不能为空',
            'account.required' => '帐号 不能为空',
        ];
    }
}
