<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|unique:sites,name,' . request('id'),
            'email' => 'nullable|email',
            'description' => 'required|min:5'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '站点名称不能为空',
            'name.min' => '站点名称不能少于5个字',
            'name.unique' => '站点名称已经存在',
            'email.email' => '邮箱格式错误',
            'description.required' => '描述不能为空',
            'description.min' => '站点介绍不能少于五个字'
        ];
    }
}
