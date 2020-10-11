<?php

namespace Modules\{MODULE_NAME}\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
  public function index()
  {
    return view('{MODULE_LOWER_NAME}::index');
  }
}
