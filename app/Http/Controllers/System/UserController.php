<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
  public function __construct()
  {
    $this->middleware('system');
  }

  public function get()
  {
    return $this->json(auth()->user());
  }
}
