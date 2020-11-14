<?php

namespace Modules\Article\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use View;

class HomeController extends Controller
{
  public function index()
  {
    return view('home');
  }
}
