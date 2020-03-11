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
      'name' => 'required|sometimes',
      'email' => 'nullable|email',
      'mobile' => 'nullable|regex:/\d{,11}/',
      'real_name' => 'sometimes|required',
      'password' => 'sometimes|between:3,20|confirmed',
      'home' => 'sometimes|url',
      'avatar' => 'sometimes|dimensions:ratio=1/1',
      'captcha' => 'sometimes|captcha'
    ];
  }
  public function messages()
  {
    return [
      'name.required' => '昵称不能为空',
      'email.required' => '邮箱不能为空',
      'email.email' => '邮箱格式错误',
      'mobile.required' => '手机号不能为空',
      'mobile.regex' => '手机号格式错误',
      'real_name.required' => '真实姓名不能为空',
      'password.required' => '密码不能为空',
      'password.between' => '密码长度在3~20位之间',
      'password.confirmed' => '两次输入密码不一致',
      'home.required' => '主页不能为空',
      'home.url' => '主页网址格式错误',
      'avatar.dimensions' => '请上传正方型头像',
      'captcha.captcha' => '验证码错误'
    ];
  }
}
