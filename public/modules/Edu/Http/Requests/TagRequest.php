<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
  public function rules()
  {
    $id = request('tag')['id'] ?? 0;
    return [
      'title' => 'required|max:10|unique:edu_tag,title,' . $id,
    ];
  }
  public function messages()
  {
    return [
      'title.required' => '标签名不能为空',
      'title.max' => '标签名不能超过10个字符',
      'title.unique' => '标签已经定义',
    ];
  }

  public function authorize()
  {
    return true;
  }
}
