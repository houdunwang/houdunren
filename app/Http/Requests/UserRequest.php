<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'name'     => 'sometimes|required',
            'password' => 'sometimes|required|min:5|confirmed',
            'icon'     => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '昵称不能为空',
            'icon.required' => '头像不能为空',
        ];
    }
}
