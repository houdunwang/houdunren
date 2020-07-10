<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SystemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'between:5,100', Rule::unique('edu_system')->ignore(request()->system)],
            'preview' => ['required'],
            'description' => ['required', 'between:10,100']
        ];
    }

    public function messages()
    {
        return ['perview.required' => '课程预览图不能为空'];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
