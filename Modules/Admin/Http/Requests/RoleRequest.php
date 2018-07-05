<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $role = request()->route('role');
        $id   = $role ? $role->id : null;

        return [
            'title' => 'required|unique:roles,title,'.$id,
            'name'  => 'required|between:3,20|unique:roles,name,'.$id,
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '名称不能为空',
            'title.unique'   => '名称已经存在',
            'name.required'  => '标识不能为空',
            'name.unique'    => '标识已经存在',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
