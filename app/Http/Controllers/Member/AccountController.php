<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\ApiController;
use App\Rules\Captcha;
use App\Services\SiteService;
use App\Services\UserService;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

/**
 * 登录注册相关
 * @package App\Http\Controllers\Member
 */
class AccountController extends ApiController
{
  protected $site;

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  /**
   * 登录界面
   * @return string
   */
  public function show(SiteService $siteService)
  {
    return view('member.login', ['site' => $this->site]);
  }

  /**
   * 接口登录
   * @param Request $request
   */
  public function login(Request $request, UserService $userService)
  {
    $request->validate([
      'username' => "required",
      'password' => 'required',
      'code' => ['sometimes', 'required', new Captcha()]
    ], ['username.required' => '用户名不能为空', 'password.required' => "密码不能为空", "code.required" => '验证码不能为空']);

    if ($userService->login($request->all())) {
      $user = auth()->user();
      $token  = $user->createToken('token')->accessToken;
      return $request->expectsJson() ?
        response()->json(['token' => $token, 'user' => $user]) :
        redirect()->intended('/');
    } else {
      return $this->error('帐号或密码错误');
    }
  }

  /**
   * 退出登录
   * @return Redirector|RedirectResponse
   */
  public function logout()
  {
    auth()->logout();
    return request()->expectsJson() ?
      ['message' => '退出成功'] :
      redirect('/login');
  }

  /**
   * 注册页面
   * @param Request $request
   * @return View|Factory
   */
  public function register(Request $request)
  {
    return view('member.register');
  }

  /**
   * 注册储存
   * @param Request $request
   * @param User $user
   * @return Redirector|RedirectResponse
   * @throws JsonEncodingException
   * @throws MassAssignmentException
   */
  public function store(Request $request, User $user)
  {
    $request->validate([
      'name' => 'required|between:3,20|unique:users|regex:/^\w{3,20}$/i',
      'nickname' => 'required',
      'password' => 'required|min:5,20|confirmed',
      'code' => 'captcha'
    ], [
      'name.required' => '帐号不能为空', 'name.between' => '用户名长度为3~20', 'name.unique' => '用户名已经存在', 'name.regex' => '用户名必须为字母/数字构成', 'nickname.required' => '昵称不能为空', 'password.required' => '密码不能为空', 'password.min' => '密码长度为5~20', 'password.confirmed' => '两次密码输入不一致', 'code.captcha' => '验证码输入错误'
    ]);

    $user->fill($request->all())->save();
    Auth::login($user);
    return request()->expectsJson() ?
      ['message' => '注册成功', 'user' => $user] :
      redirect()->intended('/');
  }
}
