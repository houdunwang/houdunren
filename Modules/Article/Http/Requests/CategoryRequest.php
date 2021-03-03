<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 栏目表单验难
 * @package Modules\Article\Http\Requests
 */
class CategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'type' => ['required'],
            'pid' => ['required'],
            'title' => ['required'],
            'url' => ['nullable', 'url'],
            'index_template' => ['required'],
            'list_template' => ['required'],
            'content_template' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'type' => '栏目类型',
            'pid' => '父级栏目',
            'title' => '栏目名称',
            'url' => '跳转链接',
            'index_template' => '封面模板',
            'list_template' => '列表模板',
            'content_template' => '内容模板',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
