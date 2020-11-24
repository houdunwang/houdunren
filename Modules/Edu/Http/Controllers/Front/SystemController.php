<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\System;

/**
 * 系统课程展示
 * @package Modules\Edu\Http\Controllers\Front
 */
class SystemController extends Controller
{
  public function index()
  {
    $systems = System::latest()->get();
    return view('edu::front.system.index', compact('systems'));
  }

  public function show(System $system)
  {
    return view('edu::front.system.show', compact('system'));
  }
}
