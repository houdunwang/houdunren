<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 会员资料修改
 * Class UserMemberRequest
 * @package App\Http\Requests
 */
class UserMemberRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|required|min:3|max:30|unique:users,name,' . auth()->id(),
            'icon' => 'sometimes|required',
            'email' => 'sometimes|email|unique:users,email,' . auth()->id(),
            'mobile' => 'sometimes|regex:/^1\d{10}$/|unique:users,mobile,' . auth()->id(),
            'code' => [
                'sometimes',
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
            'password.confirmed' => '确认密码输入错误',
            'password.min' => '密码不能小于五位',
            'password.max' => '密码长度不能超过20位',
            'qq.min' => 'QQ号不能小于三位',
            'qq.numeric' => 'QQ号输入错误',
        ];
    }
}
