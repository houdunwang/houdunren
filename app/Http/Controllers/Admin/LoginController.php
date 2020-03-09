<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * 用记登录后台系统
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
    return view('admin/login');
  }

  /**
   * 后台登录
   * @param Request $request
   */
  public function login(Request $request, UserService $userService)
  {
    if ($userService->login($request->all())) {
      return redirect('/admin');
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
