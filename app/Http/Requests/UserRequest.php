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
        return true;
    }

    public function rules()
    {
        return [
            'qq' => ['nullable', 'numeric'],
            'email' => ['nullable', 'email'],
            'home' => ['nullable', 'url'],
            'weibo' => ['nullable', 'url'],
            'github' => ['nullable', 'url'],
            'wakatime' => ['nullable', 'url'],
        ];
    }
    public function attributes()
    {
        return ['weibo' => '微博', 'home' => '个人网站', 'qq' => 'QQ号', 'github' => 'github'];
    }
}
