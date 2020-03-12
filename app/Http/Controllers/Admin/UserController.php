<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserResource;

/**
 * 用户相关
 * Class LoginController
 */
class UserController extends ApiController
{
  public function __construct()
  {
    // $this->middleware('guest', ['only' => ['show', 'login'], 'except' => 'logout']);
  }
  /**
   * 当前用户资料
   * @return void
   */
  public function index()
  {
    return $this->json(new UserResource(auth()->user()));
  }
}
