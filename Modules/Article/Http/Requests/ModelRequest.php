<?php

namespace Modules\Article\Http\Requests;;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModelRequest extends FormRequest
{
  public function authorize()
  {
    return auth()->check();
  }

  public function rules()
  {
    return [
      'title' => ['required', 'between:3,100', Rule::unique('article_models')->ignore(request()->model)->where(function ($query) {
        return $query->where('site_id', site()['id'])->where('title', request()->title);
      })],
      'description' => ['required', 'between:6,200']
    ];
  }
  public function attributes()
  {
    return ['title' => '模型名称', 'description' => '模型描述'];
  }
}
