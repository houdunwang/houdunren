<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [];
        return [
            'name'     => 'required',
            'email'    => 'sometimes|required|email',
            'password' => 'required|min:5|confirmed',
            'code'     => 'sometimes|required',
            'account'  => [
                function ($attribute, $value, $fail) {
                    if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        return true;
                    }
                    if (preg_match('/^\d+$/', $value)) {
                        return true;
                    }
                    return $fail('帐号 为邮箱或手机号');
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '昵称 不能为空',
            'code.required' => '验证码 不能为空',
        ];
    }

}
