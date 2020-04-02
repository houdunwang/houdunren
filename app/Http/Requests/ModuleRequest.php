<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
{
  public function authorize()
  {
    return isSuperAdmin();
  }

  public function rules()
  {
    return [
      'name' => 'required|unique:modules,name'
    ];
  }

  public function messages()
  {
    return [
      'name.required' => '模块标识错误',
      'name.unique' => '模块已经安装'
    ];
  }
}
