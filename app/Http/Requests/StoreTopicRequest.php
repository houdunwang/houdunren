<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTopicRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'title' => ['required', 'between:5,100'],
            'content' => ['required', 'min:10'],
            'tags' => ['sometimes', 'array', function ($attribute, array $value, $fail) {
                return collect($value)->every(fn ($id) => Tag::whereId($id)->exists())
                    ? true : $fail('标签设置错误');
            }]
        ];
    }

    public function attributes()
    {
        return ["title" => '标题', 'content' => '内容'];
    }
}
