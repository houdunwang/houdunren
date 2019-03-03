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
use Illuminate\Validation\Rule;

class SiteRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'required|max:10|unique:sites,name,' . request('site')['id'],
            'description' => 'nullable|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '站点名称不能为空',
            'name.max' => '站点标题最多10个字',
            'name.unique' => '站点名称已经存在',
            'description.required' => '站点介绍不能为空',
            'description.max' => '站点描述不能超过50个字符',
        ];
    }

}
