<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 文章表单验难
 * @package Modules\Article\Http\Requests
 */
class ContentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['sometimes', 'between:5,100'],
            'url' => ['sometimes', 'nullable', 'url'],
            'thumb' => ['sometimes', 'required'],
            'content' => ['sometimes', 'min:30'],
            'click' => ['sometimes', 'numeric'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => '文章标题',
            'url' => '跳转链接',
            'content' => '文章正文',
            'click' => '查看次数',
            'thumb' => '预览图'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
