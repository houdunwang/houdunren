<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Article\Entities\Category;

/**
 * 文章表单验难
 * @package Modules\Article\Http\Requests
 */
class ContentRequest extends FormRequest
{
    protected $fields;

    public function __construct()
    {
        $this->fields = Category::find(request('category_id'))->model->fields;
    }

    public function rules()
    {
        $rules = [];
        foreach ($this->fields as $field) {
            if ($field['validate_rule']) $rules[] = $field['validate_rule'];
        }

        return $rules + [
            'title' => ['sometimes', 'between:5,100'],
            'url' => ['sometimes', 'nullable', 'url'],
            'content' => ['sometimes', 'min:30'],
            'click' => ['sometimes', 'nullable', 'numeric'],
        ];
    }

    public function attributes()
    {
        $attributes = [];
        foreach ($this->fields as $field) {
            $attributes[$field['name']] = $field['title'];
        }
        return $attributes;
    }

    // public function messages()
    // {
    //     $messages = [];
    //     foreach ($this->fields as $field) {
    //         if ($field['validate_rule']) {
    //             $messages[] = $field['validate_error'];
    //         }
    //     }
    //     return $messages;
    // }
}
