<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * 套餐验证
 * @package Modules\Edu\Http\Requests
 */
class SubscribeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'between:3,20'],
            'month' => ['required', 'between:1,250', 'numeric'],
            'ad' => ['required'],
            'icon' => ['required'],
            'price' => ['required', 'numeric'],
        ];
    }

    public function attributes()
    {
        return ['title' => '套餐名称', 'month' => '订阅月数', 'ad' => '广告语', 'icon' => '图标', 'description' => '套餐介绍', 'price' => '套餐价格'];
    }
}
