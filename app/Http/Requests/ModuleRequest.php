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

class ModuleRequest extends FormRequest
{
    public function authorize()
    {
        return is_super_admin();
    }

    public function rules()
    {
        return [
            'title' => 'required|max:10|unique:modules,title,' . request('module')['id'],
            'name' => [
                'sometimes',
                'required',
                'max:10',
                'regex:/^[a-z]+$/i',
                'unique:modules,name,' . request('module')['id'],
            ],
            'thumb' => 'nullable|file|mimes:jpeg|dimensions:width=960,height=600',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '模块名称不能为空',
            'title.max' => '模块名称最多为10个字符',
            'title.unique' => '模块名称已经存在',
            'thumb.required' => '图片不能为空',
            'thumb.file' => '文件上传失败',
            'thumb.mimes'=>'图片类型必须为jpeg',
            'thumb.dimensions' => '模块图片尺寸错误',
            'name.required' => '模块标识不能为空',
            'name.not_in' => '模块标识已经存在',
            'name.unique' => '模块标识已经存在',
            'name.max' => '模块标识最多为10个英文字符',
            'name.regex' => '模块标识必须为字母构成',
            'thumb.required' => '模块预览图不能为空',
        ];
    }

}
