<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * 用记登录后台系统
 * Class LoginController
 */
class LoginController extends ApiController
{
  /**
   * 后台登录
   * @param Request $request
   */
  public function login(Request $request, UserService $userService)
  {
    if ($userService->login($request->all())) {
      $user = auth()->user();
      $token = $user->createToken('hdcms')->accessToken;
      return response()->json(['token' => $token, 'data' => $user], 200);
    } else {
      return $this->error("帐号或密码错误");
    }
  }

  /**
   * 退出登录
   * @return string
   */
  public function logout()
  {
    auth()->logout();
    return $this->success('退出成功');
  }
}
