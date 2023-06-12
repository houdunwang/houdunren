<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return isAdministrator();
    }

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'ad' => ['required'],
            'price' => ['required'],
            'icon' => ['required'],
            'original_price' => ['required'],
            'months' => ['required'],
        ];
    }
}
