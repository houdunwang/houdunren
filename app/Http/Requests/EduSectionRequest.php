<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EduSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'nullable|max:100',
            'content' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'title.max' => '节名称不能超过100个字符',
        ];
    }
}
