<?php

namespace Modules\Edu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
  public function index()
  {
    $activities = Activity::latest()->paginate();
    return view('edu::index', compact('activities'));
  }
}
