<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function info()
    {
        return $this->success('获取个人信息成功', auth()->user());
    }
}