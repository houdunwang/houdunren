<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return isSuperAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'site_num' => 'required|numeric',
            'days' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户组名称不能为空',
            'site_num.required' => '站点数量不能为空',
            'site_num.numeric' => '请正确填写站点数量',
            'days.required' => '有效期限不能为空',
            'days.numeric' => '有效期限必须为数字',
        ];
    }

}
