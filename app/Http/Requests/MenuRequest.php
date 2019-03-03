<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'url' => 'required|url',
            'rank' => 'required|integer|between:0,255',
            'status' => 'required',
            'icon' => 'required',
            'type' => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '菜单名称不能为空',
            'url.required' => '跳转链接不能为空',
            'url.url' => '菜单链接格式错误',
            'rank.required' => '排序不能为空',
            'rank.integer' => '排序只能是数字',
            'rank.between' => '排序只能在0~255之间',
            'status.required' => '菜单状态不能为空',
            'icon.required' => '菜单图标不能为空',
            'type.required' => '菜单类型错误',
        ];
    }

}
