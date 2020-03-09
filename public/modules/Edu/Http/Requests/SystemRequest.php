<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'title' => 'required',
      'description' => 'required',
      'preview' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'title.required' => '课程标题不能为空',
      'description.required' => '课程介绍不能为空',
      'preview.required' => '预览图片不能为空'
    ];
  }
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }
}
