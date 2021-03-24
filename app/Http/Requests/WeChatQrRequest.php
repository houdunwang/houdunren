<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\WeChatQr;

/**
 * 微信二维码
 * @package App\Http\Requests
 */
class WeChatQrRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'type' => ['required'],
            'scene_type' => ['required'],
            'scene_value' => ['required', Rule::unique('we_chat_qrs')->where(function ($query) {
                return $query->where('wechat_id', request('wechat')->id)->where('scene_value', request('scene_value'));
            })],
            'expire_seconds' => [Rule::requiredIf(function () {
                return request('scene_type') == 'scene_id';
            })]
        ];
    }

    public function attributes()
    {
        return [
            'title' => '二维码描述',
            'type' => '二维码类型',
            'scene_type' => '场景类型',
            'scene_value' => '场景值',
        ];
    }
}
