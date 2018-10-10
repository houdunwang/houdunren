<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentCategoryRequest extends FormRequest
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
            'content_model_id' => 'numeric',
            'parent_id' => 'numeric',
            'redirect_url' => 'nullable|url',
            'index_template' => 'required',
            'list_template' => 'required',
            'article_template' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '栏目名称不能为空',
            'content_model_id.required' => '请选择模型',
            'parent_id.required' => '请选择顶级栏目',
            'redirect_url.required' => '跳转链接不能为空',
            'redirect_url.url' => '跳转链接不合法',
            'index_template.required' => '请选择栏目封面模板',
            'list_template.required' => '请选择栏目列表页模板',
            'article_template.required' => '请选择栏目内容页模板',
        ];
    }

}
