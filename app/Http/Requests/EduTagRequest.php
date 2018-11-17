<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EduTagRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $tag = $this->route()->parameter('tag');
        return [
            'name' => 'required|unique:edu_tags,name,' . ($tag ? $tag['id'] : null),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '标签名不能为空',
            'name.unique' => '标签已经存在',
        ];
    }

}
