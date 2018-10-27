<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EduDocumentRequest extends FormRequest
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
            'title' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '文档名称不能为空',
            'title.max' => '文档名称不能超过100个字',
        ];
    }

}
