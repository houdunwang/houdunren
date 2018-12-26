<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EduSystemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'thumb' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'thumb.required' => '图标不能为空',
        ];
    }

}
