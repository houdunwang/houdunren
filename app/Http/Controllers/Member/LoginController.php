<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * 用户登录
 * Class LoginController
 */
class LoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest', ['only' => ['show', 'login'], 'except' => 'logout']);
  }

  /**
   * 登录界面
   * @return string
   */
  public function show()
  {
    return view('front/user_login');
  }

  /**
   * 接口登录
   * @param Request $request
   */
  public function apiLogin(Request $request, UserService $userService)
  {
    if ($userService->login($request->all())) {
      $user = auth()->user();
      $token  = $user->createToken('Token Name')->accessToken;
      return response()->json(['token' => $token, 'data' => $user], 200);
    } else {
      return $this->error('帐号或密码错误');
    }
  }

  /**
   * 登录
   * @param Request $request
   * @param UserService $userService
   *
   * @return void
   */
  public function login(Request $request, UserService $userService)
  {
    $request->validate(
      ['code' => 'required|captcha', 'username' => 'required', 'password' => 'required'],
      ['code.required' => '验证码不能为空', 'code.captcha' => '验证码输入错误', 'username.required' => '帐号不能为空', 'password.required' => '密码不能为空']
    );
    if ($userService->login($request->all())) {
      return redirect()->intended('/');
    } else {
      return back()->withInput()->with('error', '帐号或密码错误');
    }
  }
  /**
   * 退出登录
   * @return string
   */
  public function logout()
  {
    auth()->logout();
    return redirect('/member/login');
  }
}
