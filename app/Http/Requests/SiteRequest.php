<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //站点不能重名
        $params = \Route::getCurrentRoute()->parameters();
        $id = $params ? $params['site']['id'] : null;
        return [
            'name' => [
                'required',
                'max:10',
                'unique:sites,name,' . $id,
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '站点名称不能为空',
            'name.max' => '站点标题最多10个字',
            'name.unique' => '站点名称已经存在',
        ];
    }

}
