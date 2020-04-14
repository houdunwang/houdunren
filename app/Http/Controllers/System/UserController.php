<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends ApiController
{
    public function __construct()
    {
        $this->middleware('system');
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        Auth::user()->fill($data)->save();
        return $this->success('保存成功');
    }
}
