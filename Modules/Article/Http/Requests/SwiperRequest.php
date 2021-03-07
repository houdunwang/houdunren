<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Article\Entities\Category;

/**
 * 幻灯片表单
 * @package Modules\Article\Http\Requests
 */
class SwiperRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required'],
            'items' => ['required', 'between:1,10'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => '幻灯片标题',
            'items' => '元素'
        ];
    }
}
