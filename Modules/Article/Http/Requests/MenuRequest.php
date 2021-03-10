<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 菜单表单验难
 * @package Modules\Article\Http\Requests
 */
class MenuRequest extends FormRequest
{
    public function rules()
    {

        return  [
            'title' => ['required', 'between:5,100'],
            'url' => ['required', 'nullable', 'url'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => '菜单名称',
            'url' => '跳转链接'
        ];
    }
}
