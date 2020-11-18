<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

/**
 * 后台系统主页
 * @package App\Http\Controllers\System
 */
class HomeController extends Controller
{
  // public function index()
  // {
  //   if (user()->isSuperAdmin) {
  //     $sites = Site::all();
  //   } else {
  //     $sites = user()->allSites;
  //   }

  //   return view('system.index', compact('sites'));
  // }

  public function index()
  {
    return view('system.home.index');
  }
}
