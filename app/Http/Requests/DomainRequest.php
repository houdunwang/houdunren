<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Requests;

use App\Models\Domain;
use Illuminate\Foundation\Http\FormRequest;

class DomainRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => [
                'nullable',
                'url',
                function ($attribute, $value, $fail) {
                    $domain = Domain::where('name', $this->request->get('name'))
                        ->where('module_id', '<>', \module()['id'])
                        ->first();
                    if ($domain) {
                        return $fail("域名已经被站点【 " . $domain->site['name']
                            . "】的模块【" . $domain->module['title'] . "】使用");
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '域名不能为空',
            'name.url' => '域名必须是合法的网址',
        ];
    }

}
