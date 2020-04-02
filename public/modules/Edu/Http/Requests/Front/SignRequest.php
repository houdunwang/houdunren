<?php

namespace Modules\Edu\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SignRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'content' => 'required',
      'mood' => "required"
    ];
  }

  public function messages()
  {
    return [
      'content.required' => '签到内容不能为空',
      'mood.required' => '请选择心情头像'
    ];
  }

  public function authorize()
  {
    return Auth::check();
  }
}
