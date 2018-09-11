<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
            'title'   => 'required|max:50',
            'content' => "required",
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => '标题不能为空',
            'title.max'        => '标题长度不能超过50个字符',
            'content.required' => '内容不能为空',
        ];
    }

}
