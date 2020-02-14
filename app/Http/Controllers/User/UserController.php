<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    /**
     * 获取个人信息
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(): \Illuminate\Http\JsonResponse
    {
        return $this->success('获取成功', auth()->user());
    }
}
