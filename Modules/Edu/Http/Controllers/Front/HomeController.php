<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Topic;
use Spatie\Activitylog\Models\Activity;

/**
 * 前台主页
 * @package Modules\Edu\Http\Controllers
 */
class HomeController extends Controller
{
    public function index()
    {
        $topics = Topic::where('recommend', true)->with('user')->get();
        $activities = Activity::latest()->with(['subject.user', 'causer'])->paginate();

        return view('edu::front.home.index', compact('activities', 'topics'));
    }
}
