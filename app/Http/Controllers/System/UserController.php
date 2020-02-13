<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;

/**
 * 后台用户管理
 * Class UserController
 * @package App\Http\Controllers\System
 */
class UserController extends ApiController
{
    public function __construct()
    {
        $this->authorizeResource(User::class,'user');
    }

    public function index()
    {

    }

    public function store(Request $request)
    {
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->all())->save();
        return $this->success('编辑用户成功',$user);
    }

    public function destroy(User $user)
    {
    }
}
