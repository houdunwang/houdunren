<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 会员组
 */
class GroupRequest extends FormRequest
{
    public function authorize()
    {
        return user()->isSuperAdmin;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:3'],
            'site_num' => ['required', 'between:1,255'],
            'days' => ['required', 'between:1,65535'],
        ];
    }

    public function attributes()
    {
        return ['title' => '套餐名称', 'site_num' => '站点数量', 'days' => '可用天数'];
    }
}
