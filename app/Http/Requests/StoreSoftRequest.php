<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSoftRequest extends FormRequest
{
    public function authorize(): bool
    {
        return isAdministrator();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'max:50'],
            'description' => ['required', 'between:10,200'],
            'content' => ['required'],
            'preview' => ['required', 'url'],
        ];
    }

    public function attributes()
    {
        return ['title' => '软件名称', 'description' => '软件简介', 'content' => '使用说明', 'preview' => '预览图片'];
    }
}
