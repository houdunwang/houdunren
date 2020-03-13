<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
  public function __construct()
  {
  }
  public function get()
  {
    return $this->json(auth()->user());
  }
}
