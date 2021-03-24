<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

/**
 * 微信素材
 * @package App\Http\Requests
 */
class WeChatMaterialRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [];
    }

    public function attributes()
    {
        return [];
    }
}
