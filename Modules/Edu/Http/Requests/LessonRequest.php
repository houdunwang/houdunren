<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LessonRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => ['required', 'between:5,100', Rule::unique('edu_lessons')->ignore(request()->lesson)],
            'thumb' => ['required'],
            'free_num' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'url' => ['nullable', 'url'],
        ];
    }
    public function messages()
    {
        return ['free_num.required' => '免费观看数量不能为空'];
    }
    public function authorize()
    {
        return true;
    }
}
