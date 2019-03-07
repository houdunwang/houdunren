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

class GroupRequest extends FormRequest
{
    public function authorize()
    {
        return isSuperAdmin();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'site_num' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户组名称不能为空',
            'site_num.required' => '站点数量不能为空',
            'site_num.numeric' => '请正确填写站点数量',
        ];
    }

}
