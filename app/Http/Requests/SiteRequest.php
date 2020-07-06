<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:3', 'max:30', Rule::unique('sites')->ignore(request()->site)],
            'domain' => ['required', 'url', Rule::unique('sites')->ignore(request()->site)]
        ];
    }
}
