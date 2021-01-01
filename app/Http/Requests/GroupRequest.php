<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 会员组
 */
class GroupRequest extends FormRequest
{
    public function authorize()
    {
        return user()->isSuperAdmin();
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:3']
        ];
    }
}
