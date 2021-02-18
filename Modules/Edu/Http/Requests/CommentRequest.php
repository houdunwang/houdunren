<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Edu\Rules\CommentRule;
use Auth;

/**
 * 评论验证
 * @package Modules\Edu\Http\Requests
 */
class CommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'content' => ['required', new CommentRule()]
        ];
    }

    public function authorize()
    {
        return Auth::check();
    }
}
