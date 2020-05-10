<?php

namespace Modules\Edu\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TopicRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|between:5,100',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'title.between' => '标题长度在5~100个字符',
            'title.content' => '贴子内容不能为空',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }
}
