<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 签到验证
 * @package Modules\Edu\Http\Requests
 */
class SignRequest extends FormRequest
{
    public function rules()
    {
        return [
            'content' => ['required', 'between:10,100'],
            'mood' => ['required']
        ];
    }
    public function attributes()
    {
        return ['content' => '签到内容', 'mood' => '签到心情'];
    }

    public function authorize()
    {
        return true;
    }
}
