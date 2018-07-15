<?php

namespace Modules\Article\Http\Requests\ContentRequest;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
    //验证规则
    public function rules()
    {
        return array (
);
    }

    //错误信息处理
    public function messages()
    {
        return array (
);
    }

    //权限验证
    public function authorize()
    {
        return true;
    }
}
