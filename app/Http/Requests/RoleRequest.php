<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * 站点角色
 */
class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:2', 'max:20', Rule::unique('roles')->ignore(request()->role)->where(function ($query) {
                $query->where('site_id', request()->site->id);
            })],
            'name' => ['required', 'regex:/^[a-z]+$/', 'min:3', Rule::unique('roles')->ignore(request()->role)->where(function ($query) {
                return $query->where('site_id', request()->site->id);
            })],
        ];
    }

    public function attributes()
    {
        return ['title' => '角色名称', 'name' => '角色标识'];
    }
}
