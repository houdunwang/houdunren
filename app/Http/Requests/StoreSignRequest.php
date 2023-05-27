<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreSignRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'mood' => ['required'],
            'content' => ['required', 'between:5,100'],
            'captcha' => 'required|captcha_api:' . request('captcha_key') . ',math'
        ];
    }

    public function attributes()
    {
        return ['mood' => '请选择签到心情', 'content' => '你没有写内容', 'captcha' => '验证码'];
    }

    public function messages()
    {
        return ['captcha.captcha_api' => '验证码输入错误'];
    }
}
