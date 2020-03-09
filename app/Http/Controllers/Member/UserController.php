<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
  /**
   * 获取当前登录用户资料
   * @return \Illuminate\Http\JsonResponse
   */
  public function me(): \Illuminate\Http\JsonResponse
  {
    return $this->success('获取成功', auth()->user());
  }
}
