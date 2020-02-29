<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
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
   */
  public function show()
  {
    return view('admin/login');
  }
  /**
   * 后台登录
   * @param Request $request
   */
  public function login(Request $request)
  {
    $credentials = [];
    $type = filter_var($request['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    $credentials['password'] = $request['password'];
    $credentials[$type] = $request['username'];

    if (auth()->attempt($credentials)) {
      return redirect('/admin');
    } else {
      return back()->withInput()->with('error', '帐号或密码错误');
    }
  }

  /**
   * 退出登录
   * @return void
   */
  public function logout()
  {
    auth()->logout();
    return redirect(route('admin.login'));
  }
}
