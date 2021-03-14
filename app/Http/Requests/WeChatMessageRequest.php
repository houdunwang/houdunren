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
            'keyword_type' => ['required'],
            'keyword' => ['required', Rule::unique('we_chat_messages')->ignore(request('message'))->where(function ($query) {
                return $query->where('site_id', SID)->where('wechat_id', request('wechat')->id);
            })],
            'content' => ['required'],
            'content.title' => ['sometimes', 'required'],
            'content.pic' => ['sometimes', 'required'],
            'content.url' => ['sometimes', 'required', 'url'],
            'content.description' => ['sometimes', 'required'],
            // 'content.content' => ['sometimes', 'required'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => '消息描述', 'keyword_type' => '关键词类型', 'keyword' => '关键词', 'content' => '回复内容',
            'content.title' => '文章标题',
            'content.pic' => '消息图片',
            'content.url' => '跳转链接',
            'content.description' => '消息简介',
            'content.content' => '内容',
        ];
    }
}
