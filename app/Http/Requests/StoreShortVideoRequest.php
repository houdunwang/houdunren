<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShortVideoRequest extends FormRequest
{
    public function authorize()
    {
        return isAdministrator();
    }

    public function rules()
    {
        return [];
    }
}
