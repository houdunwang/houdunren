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

class PackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return is_super_admin();
    }

    public function rules()
    {
        return [
            'name' => 'required|max:10|unique:packages,name,' . request('package')['id'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '套餐名称不能为空',
            'name.max' => '套餐名称不能超过10个字',
            'name.unique' => '套餐名称已经存在',
        ];
    }

}
