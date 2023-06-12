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
            'title' => ['required', 'between:4,100'],
            // 'content' => ['required', 'min:10']
            'filename' => [function ($attribute, $value, $fail) {
                $file = request()->input('filename');
                if ($file && !is_file(base_path("markdown/{$file}"))) {
                    $fail('文件不存在');
                }
            }],
            'content' => [function ($attribute, $value, $fail) {
                if (!request()->input('filename')) {
                    if (mb_strlen($value, 'utf-8') < 20) {
                        $fail('内容不能小于20个字');
                    }
                }
            }],
        ];
    }

    public function attributes()
    {
        return ["title" => '标题', 'content' => '内容'];
    }
}
