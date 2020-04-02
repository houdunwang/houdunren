<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
  public function rules()
  {
    return [
      'title' => 'required|min:3|unique:edu_lessons,title,' . request('id'),
      'description' => 'required'
    ];
  }
  public function messages()
  {
    return [
      'title.required' => '课程名称不能为空',
      'title.unique' => '标题已经存在',
      'description.required' => '课程介绍不能为空'
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
