<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index()
  {
    return view('edu::front.home.index');
  }
}
