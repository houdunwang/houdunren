<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
  public function rules()
  {
    $id = request('tag')['id'] ?? 0;
    return [
      'name' => 'required|max:10|unique:edu_tag,name,' . $id,
      'group' => 'required'
    ];
  }
  public function messages()
  {
    return [
      'name.required' => '标签名不能为空',
      'name.max' => '标签名不能超过10个字符',
      'name.unique' => '标签已经定义',
      'group.required' => '会员组不能为空'
    ];
  }

  public function authorize()
  {
    return true;
  }
}
