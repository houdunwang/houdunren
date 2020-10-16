<?php

namespace App\Http\Controllers;

use App\Services\ModuleService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    if (module() === null) {
      return view('home.404');
    }

    module(site()->module['name']);
    $class = 'Modules\\' . site()->module['name'] . '\Http\Controllers\HomeController';
    return app($class)->index($request);
  }
}
