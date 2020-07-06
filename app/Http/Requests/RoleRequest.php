<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'title' => ['required', 'min:3', 'max:20'],
      'name' => ['required', 'regex:/^[a-z]+$/', 'min:5'],
    ];
  }
}
