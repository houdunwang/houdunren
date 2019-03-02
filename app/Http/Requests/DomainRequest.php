<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|url|unique:modules,name,'.module()->domain['id'],
        ];
    }

    public function messages()
    {
        return ['name.required' => '域名不能为空', 'name.url' => '域名必须是合法的网址'];
    }

}
