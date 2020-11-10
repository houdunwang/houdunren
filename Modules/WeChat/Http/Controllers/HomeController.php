<?php

namespace Modules\WeChat\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
  public function index()
  {
    return view('wechat::index');
  }
}
