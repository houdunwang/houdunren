<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\ApiController;

class ModuleController extends ApiController
{
  public function __construct()
  {
    $this->middleware('siteAuth');
  }
}
