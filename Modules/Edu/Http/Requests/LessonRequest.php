<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 *  * 课程验证
 * @package Modules\Edu\Http\Requests
 */
class LessonRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'between:5,100'],
            'thumb' => ['required'],
            'free_num' => ['required', 'max:200'],
            'description' => ['required', 'min:10', 'max:100'],
            'download_address' => ['nullable', 'url'],
        ];
    }

    public function attributes()
    {
        return ['download_address' => '下载地址', 'free_num' => '免费观看数量', 'thumb' => '预览图片', 'description' => '课程简介'];
    }
}
