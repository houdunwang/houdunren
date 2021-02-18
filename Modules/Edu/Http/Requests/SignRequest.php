<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
