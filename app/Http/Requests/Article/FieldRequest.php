<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FieldRequest extends FormRequest
{
  public function authorize()
  {
    return auth()->check();
  }

  public function rules()
  {
    $model_id = request()->field ? request()->field['model_id'] : request()->model['id'];
    return [
      'title' => ['required', Rule::unique('article_fields')->ignore(request()->field)->where(function ($query) use ($model_id) {

        return $query->where('site_id', site()['id'])->where('model_id', $model_id);
      })],

      'name' => ['required', Rule::unique('article_fields')->ignore(request()->field)->where(function ($query) use ($model_id) {
        return $query->where('site_id', site()['id'])->where('model_id', $model_id);
      })],

    ];
  }

  public function messages()
  {
    return [
      'title.unique' => '字段名称已经存在',
      'name.unique' => '标识已经被使用'
    ];
  }
}
