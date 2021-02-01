<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:5'],
            'logo' => ['required', 'mimes:jpeg', 'size:1000000'],
            'copyright' => ['required'],
        ];
    }
}
