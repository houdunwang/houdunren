<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
  public function authorize()
  {
    return auth()->check();
  }

  public function rules()
  {
    return [
      'title' => ['required', 'between:2,1000'],
      'description' => ['max:100'],
      'url' => ['nullable', 'url'],
    ];
  }

  public function messages()
  {
    return [
      'title.required' => '标题不能为空',
      'title.between' => '标题长度错误',
      'url.url' => '栏目跳转链接错误',
    ];
  }
}
