<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentSlideRequest extends FormRequest
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
            'title' => 'required',
            'url' => 'url',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '幻灯片描述不能为空',
            'url.url' => '跳转链接错误',
            'image' => '图片不能为空',
        ];
    }

}
