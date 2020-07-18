<?php

namespace Modules\Edu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Topic;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        $topics = Topic::where('recommend', true)->get();
        $activities = Activity::latest()->paginate();
        return view('edu::index', compact('activities', 'topics'));
    }
}
