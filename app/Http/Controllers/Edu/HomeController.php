<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $db = Activity::orderBy('id', 'DESC');
        if ($request->query('t') == 'follow') {
            $db->whereIn('causer_id', auth()->user()->follower->pluck('id'));
        }
        $activitys = $db->paginate(15);
        return view('edu.index', compact('activitys'));
    }
}
