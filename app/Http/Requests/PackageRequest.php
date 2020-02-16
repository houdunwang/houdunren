<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{
  public function authorize()
  {
    return auth()->user()->is_super_admin;
  }

  public function rules()
  {
    return [
      'name' => 'required|max:20|unique:packages,name,' . request('id')
    ];
  }

  public function messages()
  {
    return [
      'name.required' => '套餐名称不能为空',
      'name.max' => '套餐名称不能超过20个字符',
      'name.unique' => '套餐名称已经存在'
    ];
  }
}
