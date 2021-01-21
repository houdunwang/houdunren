<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

/**
 * 用户验证
 * @package App\Http\Requests
 */
class UserRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'github' => ['nullable', 'url'],
            'weibo' => ['nullable', 'url'],
            'qq' => ['nullable', 'numeric'],
        ];
    }
    public function attributes()
    {
        return ['weibo' => '微博'];
    }
}
