<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WeChatRequest extends FormRequest
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
            'title' => ['required'],
            'introduce' => ['required'],
            'token' => ['required'],
            'type' => ['required'],
            'appid' => ['required', Rule::unique('we_chats')->ignore(request()->wechat)],
            'appsecret' => ['required', Rule::unique('we_chats')->ignore(request()->wechat)],
        ];
    }

    public function attributes()
    {
        return ['title' => '公众号名称', 'introduce' => '公众号介绍', 'type' => '公众号类型', 'name' => '微信号'];
    }
}
