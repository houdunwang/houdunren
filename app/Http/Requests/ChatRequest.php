<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return is_super_admin() ;
    }

    public function rules()
    {
        return [
            'name' => ['required',Rule::unique('chats')->where(function ($query) {
                return $query->where('id','<>',request('chat')['id'])->where('site_id',request('site')['id']);
            })],
            'account' => 'required',
            'original' => 'required',
            'genre' => 'required',
            'appid' => 'required',
            'appsecret' => 'required',
            'qr' => 'required',
            'icon' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '公众号名称 不能为空',
            'name.unique' => '公众号名称 已经存在',
            'account.required' => '微信号 不能为空',
            'original.required' => '原始ID 不能为空',
            'genre.required' => '公众号类型 不能为空',
            'appid.required' => 'AppId 不能为空',
            'appsecret.required' => 'AppSecret 不能为空',
            'qr.required' => '二维码 不能为空',
            'icon.required' => '图标 不能为空',
        ];
    }

}
