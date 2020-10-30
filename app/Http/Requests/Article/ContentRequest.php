<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
  public function authorize()
  {
    return auth()->check();
  }

  public function rules()
  {
    return [
      'title' => ['nullable', 'between:5,100'],
      'description' => ['nullable', 'between:5,100'],
      'url' => ['nullable', 'url']
    ];
  }
  public function messages()
  {
    return [
      'title.between' => '标题只能长度为5到100个字符',
      'description.between' => '文章简单长度为5到100个字符',
      'url' => '跳转链接错误'
    ];
  }
}
