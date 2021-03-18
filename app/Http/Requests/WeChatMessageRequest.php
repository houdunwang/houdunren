<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;

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
        $rules = [
            'title' => ['required'],
            'keyword' => ['required', Rule::unique('we_chat_messages')->ignore(request('message'))->where(function ($query) {
                return $query->where('wechat_id', request('wechat')->id);
            })],
            'content' => ['required'],
        ];

        return $rules + $this->typeRule();
    }

    /**
     * 类型规则
     * @return array
     * @throws BindingResolutionException
     */
    protected function typeRule()
    {
        $rules = [];
        switch (request('type')) {
            case 'news':
                //图文消息
                $rules += [
                    'content.title' => ['sometimes', 'required'],
                    'content.pic' => ['sometimes', 'required'],
                    'content.url' => ['sometimes', 'required', 'url'],
                    'content.description' => ['sometimes', 'required'],
                ];
                break;
        }
        return $rules;
    }

    public function attributes()
    {
        return [
            'title' => '消息描述',
            'content.title' => '文章标题',
            'content.pic' => '消息图片',
            'content.url' => '跳转链接',
            'content.description' => '消息简介',
            'content.content' => '内容',
        ];
    }
}
