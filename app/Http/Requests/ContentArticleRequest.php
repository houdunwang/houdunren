<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentArticleRequest extends FormRequest
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
            'category_id' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '文章标题不能为空',
            'category_id.required' => '请选择栏目',
            'content' => '内容不能为空',
        ];
    }
}
