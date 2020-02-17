<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return auth()->user()->is_super_admin;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    $id = request('group')['id'] ?? 0;
    return [
      'name' => 'required|unique:groups,name,' . $id,
      'site_num' => 'required|numeric'
    ];
  }

  public function messages()
  {
    return [
      'name.required' => '组名称不能为空',
      'name.unique' => '用户组已经存在',
      'site_num' => '请输入正确的站点数量'
    ];
  }
}
