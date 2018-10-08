<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentModelRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $params = \Route::getCurrentRoute()->parameters();
        $id = $params ? $params['model']['id'] : null;
        return [
            'title' => 'required|unique:content_models,title,' . $id,
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '模块描述不能为空',
        ];
    }

}
