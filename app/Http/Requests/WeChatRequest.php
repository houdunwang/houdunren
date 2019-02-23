<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeChatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return isSuperAdmin() ;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'account' => 'required',
            'original' => 'required',
            'genre' => 'required',
            'app_id' => 'required',
            'app_secret' => 'required',
            'qr' => 'required',
            'icon' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '公众号名称 不能为空',
            'account.required' => '微信号 不能为空',
            'original.required' => '原始ID 不能为空',
            'genre.required' => '公众号类型 不能为空',
            'app_id.required' => 'AppId 不能为空',
            'app_secret.required' => 'AppSecret 不能为空',
            'qr.required' => '二维码 不能为空',
            'icon.required' => '图标 不能为空',
        ];
    }

}
