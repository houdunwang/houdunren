<?php

namespace App\Http\Requests\Article;

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
      'title' => ['required', 'between:3,100', Rule::unique('article_models')->where(function ($query) {
        return $query->where('site_id', site()['id'])->where('title', request()->title);
      })],
      'description' => ['required', 'between:6,200']
    ];
  }
}
