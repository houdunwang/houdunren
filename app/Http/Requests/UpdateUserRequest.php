<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'between:1,8'],
            'home' => ['nullable', 'url'],
            'weibo' => ['nullable', 'url'],
            'github' => ['nullable', 'url'],
            'qq' => ['nullable', 'numeric']
        ];
    }

    public function attributes()
    {
        return ['name' => '昵称', 'weibo' => '微博', 'home' => '个人网站', 'qq' => "QQ号"];
    }
}
