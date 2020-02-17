<?php
namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 用记登录后台系统
 * Class LoginController
 * @package App\Http\Controllers\Admin
 */
class LoginController extends ApiController
{
  /**
   * 后台登录
   * @param Request $request
   * @return JsonResponse
   */
  public function login(Request $request): ?JsonResponse
  {
    $credentials = [];
    $type = filter_var($request['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    $credentials['password'] = $request['password'];
    $credentials[$type] = $request['username'];
    if (auth()->attempt($credentials)) {
      $user = auth()->user();
      $token = $user->createToken('hdcms')->accessToken;
      return response()->json(['token' => $token, 'data' => $user], 200);
    } else {
      return $this->error('帐号或密码错误');
    }
  }
}
