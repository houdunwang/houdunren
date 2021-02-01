<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use UserService;
use Auth;

/**
 * 会员组表单验证
 * @package App\Http\Requests
 */
class GroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'between:3,30'],
            'site_num' => ['required', 'integer', 'between:1,255'],
            'days' => ['required', 'integer', 'between:1,65535'],
        ];
    }

    public function attributes()
    {
        return ['title' => '套餐名称', 'site_num' => '站点数量', 'days' => '可用天数'];
    }
}
