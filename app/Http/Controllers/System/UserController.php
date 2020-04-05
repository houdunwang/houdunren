<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

/**
 * 获取管理员资料
 * @package App\Http\Controllers\System
 */
class UserController extends ApiController
{
    public function __construct()
    {
        $this->middleware('system');
    }

    public function get()
    {
        return new UserResource(Auth::user());
    }
}
