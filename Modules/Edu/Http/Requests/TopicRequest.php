<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
{
  public function rules()
  {
    return [
      'title' => ['required', 'between:6,100'],
      'content' => ['required', 'between:20,6000'],
    ];
  }

  public function authorize()
  {
    return true;
  }
}
