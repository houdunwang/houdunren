<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentModuleRequest extends FormRequest
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
        //修改时模块对象
        $module = \Route::current()->parameter('module');
        return [
            'domain' => 'nullable|url|unique:modules,domain,' . $module['id'],
        ];
    }
}
