<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('category') ? $this->route('category')->id : 0;
        return [
            'name' => 'required|unique:categories,name,' . $id
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '栏目名称不能为空',
            'name.unique' => '栏目已经存在'
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
