<?php

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
        return isSuperAdmin();
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
