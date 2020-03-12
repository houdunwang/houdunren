<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * 用户相关
 * Class LoginController
 */
class LoginController extends Controller
{
  public function __construct()
  {
    // $this->middleware('guest', ['only' => ['show', 'login'], 'except' => 'logout']);
  }

  /**
   * 登录界面
   * @return string
   */
  public function show()
  {
    if (auth()->check()) {
      return redirect('/admin');
    }
    return view('admin/login');
  }

  /**
   * 后台登录
   * @param Request $request
   */
  public function login(Request $request, UserService $userService)
  {
    $request->validate(
      ['code' => 'sometimes|captcha', 'username' => 'required', 'password' => 'required'],
      ['code.captcha' => '验证码输入错误', 'username.required' => '帐号不能为空', 'password.required' => '密码不能为空']
    );
    if ($userService->login($request->all())) {
      return redirect('/site');
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
    return redirect('admin/login');
  }
}
