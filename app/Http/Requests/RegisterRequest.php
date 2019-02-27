<?php

namespace App\Http\Requests;

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
    public function rules()
    {
        return [
            'site_id' => 'required',
            'name' => 'required|min:3|max:30',
            'username' => [
                'required',
                function ($attribute, $value, $fail) {
                    $mail =
                        filter_var($value, FILTER_VALIDATE_EMAIL) && config_get('user.register_email', '', 'site');
                    $mobile =
                        preg_match('/^1\d{10}$/', $value) && config_get('user.register_mobile', '', 'site');
                    if (!($mail || $mobile)) {
                        $fail('帐号格式错误');
                    }
                },
            ],
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
        ];
    }

    public function messages()
    {
        return [
            'site_id.required' => '注册站点错误',
            'name.required' => '昵称不能为空',
            'name.min' => '昵称不能小于3个字符',
            'name.max' => '昵称不能超过30个字符',
            'username.required' => '帐号不能为空',
            'password.confirmed' => '确认密码输入错误',
            'password.min' => '密码不能小于5位',
            'password.max' => '密码长度不能超过20位',
        ];
    }
}
