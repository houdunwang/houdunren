<?php

namespace App\Http\Controllers;

use App\Services\ModuleService;
use Illuminate\Http\Request;
use View;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    if (site()['article']) {
      return $this->article($request);
    }
    if ($content = $this->module($request)) {
      return $this->module($request);
    }
    return view('home.404');
  }

  protected function article(Request $request)
  {
    return view('home');
  }

  protected function module(Request $request)
  {
    if (module()) {
      module(site()->module['name']);
      $class = 'Modules\\' . site()->module['name'] . '\Http\Controllers\HomeController';
      return app($class)->index($request);
    }
  }
}
