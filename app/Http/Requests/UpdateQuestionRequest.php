<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'description' => ['required', 'min:10'],
            'lists' => ['required',  function ($attribute, $value, $fail) {
                if (count($value) < 2 || count($value) > 4) {
                    $fail('答案数量介于2~4个');
                }
            }],
            'type' => ['required'],
            'answer' => ['required', 'min:1']
        ];
    }

    public function attributes()
    {
        return ['description' => '问题描述', 'lists' => '答案', 'type' => '问题类型', 'answer' => '正确答案'];
    }
}
