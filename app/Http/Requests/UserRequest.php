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
 * 修改用户资料
 * Class UserRequest
 * @package App\Http\Requests
 */
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|required|max:30|unique:users,name,' . request('user')['id'],
            'email' => 'sometimes|nullable|email|unique:users,email,' . request('user')['id'],
            'mobile' => 'sometimes|nullable|numeric|unique:users,mobile,' . request('user')['id'],
            'password' => 'nullable|confirmed|min:5|max:20',
            'group_id' => 'sometimes|required|numeric',
            'admin_end' => 'sometimes|required|date',
            'qq' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '昵称不能为空',
            'name.max' => '昵称不能超过30个字符',
            'password.confirmed' => '确认密码输入错误',
            'password.min' => '密码不能小于5位',
            'password.max' => '密码长度不能超过20位',
            'group_id.required' => '会员组不能为空',
            'admin_end.required' => '到期时间不能为空',
            'admin_end.date' => '至期时间格式错误',
            'qq.numeric' => 'QQ号输入错误',
            'mobile.numeric' => '手机号格式错误',
            'email.email' => '邮箱格式错误',
        ];
    }
}
