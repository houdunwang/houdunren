<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    $id = request('subscribe')['id'] ?? 0;
    return [
      'title' => 'required|unique:edu_subscribe,title,' . $id,
      'price' => 'required|numeric',
      'month' => 'required|numeric|max:100|unique:edu_subscribe,month,' . $id,
      'ad' => 'between:3,30',
      'icon' => 'required'
    ];
  }
  public function messages()
  {
    return [
      'title.required' => '标题不能为空',
      'title.unique' => '名称已经存在',
      'price.required' => '请输入订阅价格',
      'price.integer' => '订阅价格只能为数字',
      'ad.between' => '广告语为3~30个字符',
      'month.required' => '请输入月数',
      'month.integer' => '订阅月数只能为数字',
      'month.max' => '最多100个月',
      'month.unique' => '相同订阅月数已经存在',
      'icon.required' => '图标不能为空'
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
