<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTopicRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'title' => ['required', 'between:5,100'],
            'content' => ['required', 'min:10']
        ];
    }

    public function attributes()
    {
        return ["title" => '标题', 'content' => '内容'];
    }
}
