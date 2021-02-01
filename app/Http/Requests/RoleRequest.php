<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * 站点角色
 * @package App\Http\Requests
 */
class RoleRequest extends FormRequest
{
    public function rules()
    {
        $rid = request('role')->id ?? 0;
        $sid = request('site')->id ?? 0;
        return [
            'title' => ['required', 'min:2', 'max:20', Rule::unique('roles')->where(function ($query) use ($sid, $rid) {
                return $query->whereNotIn('id', [$rid])->where('site_id', $sid);
            })],
            'name' => ['required', 'between:3,10', Rule::unique('roles')->where(function ($query) use ($sid, $rid) {
                return $query->whereNotIn('id', [$rid])->where('site_id', $sid);
            })],
        ];
    }

    public function attributes()
    {
        return ['title' => '角色名称', 'name' => '角色标识'];
    }
}
