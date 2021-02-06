<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * 系统课程验证
 * @package Modules\Edu\Http\Requests
 */
class SystemLessonRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'min:5', Rule::unique('edu_system')->where(function ($query) {
                if ($system = request("system")) {
                    return $query->where('site_id', site()['id'])->whereNotIn('id', $system['id']);
                }
            })],
            'description' => ['required', 'min:10'],
            'preview' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'preview' => '预览图'
        ];
    }
}
