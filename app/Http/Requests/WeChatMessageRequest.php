<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

/**
 * 微信规则
 * @package App\Http\Requests
 */
class WeChatMessageRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'keyword' => ['required', Rule::unique('we_chat_messages')->ignore(request('message'))->where(function ($query) {
                return $query->where('site_id', SID)->where('wechat_id', request('wechat')->id);
            })],
        ];
    }
}
