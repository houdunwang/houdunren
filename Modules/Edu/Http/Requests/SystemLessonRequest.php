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
                return $query->where('site_id', site()['id'])->when(request('system'), function ($query, $system) {
                    return $query->whereNotIn('id', [$system['id']])->where('title', $system['title']);
                });
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
