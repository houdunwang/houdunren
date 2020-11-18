<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use RuntimeException;

/**
 * 用户登录
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
    $this->middleware('auth')->only('logout');
  }

  public function show()
  {
    return view('auth.login.show');
  }

  /**
   * 用户登录
   * @param Request $request
   * @return mixed
   * @throws BindingResolutionException
   * @throws RuntimeException
   */
  public function login(Request $request)
  {
    $request->validate([
      'account' => ['required', $this->accountRule()],
      'password' => ['required', 'min:3'],
      'captcha' => ['required', 'captcha'],
    ], ['account.regex' => '帐号格式错误']);

    $isLogin = Auth::attempt([
      $this->account() => $request->account,
      'password' => $request->password
    ], $request->has('remember'));

    if ($isLogin) {
      return $request->session()->pull('url.intended', '/');
    }

    return response()->json(['message' => '帐号或密码错误'], 403);
  }

  /**
   * 退出登录
   * @return Redirector|RedirectResponse
   * @throws RuntimeException
   * @throws Exception
   * @throws BindingResolutionException
   */
  public function logout()
  {
    Auth::logout();
    return redirect('/')->with('message', '您已退出帐号');
  }
}
