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
            'domain' => 'required|url|unique:sites,domain,' . request('id'),
            'email' => 'nullable|email',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '站点名称不能为空',
            'name.min' => '站点名称不能少于5个字',
            'name.unique' => '站点名称已经存在',
            'email.email' => '邮箱格式错误',
            'domain.url' => '域名格式错误',
        ];
    }
}
