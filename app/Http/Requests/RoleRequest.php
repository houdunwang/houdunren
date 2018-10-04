<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        if (\Route::getCurrentRequest()->method == 'PUT') {
            $id = \Route::getCurrentRoute()->parameters()['role']->id;
            return [
                'title' => 'required|unique:roles,title,' . $id,
                'name'  => 'required|regex:/^[a-z]+$/|unique:roles,name,' . $id,
            ];
        } else {
            return [
                'title' => 'required|unique:roles,title',
                'name'  => 'required|regex:/^[a-z]+$/',
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required' => '角色中文描述不能为空',
            'title.unique'   => '角色中文描述已经存在',
            'name.regex'     => '角色标识只能为英文字母',
            'name.required'  => '角色标识不能为空',
            'name.unique'    => '角色标识已经存在',
        ];
    }

}
