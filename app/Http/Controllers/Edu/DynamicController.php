<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class DynamicController extends Controller
{
    public function index(Request $request)
    {
        $activitys = Activity::latest('updated_at')->paginate(10);
//        if ($request->query('t') == 'follow') {
//            $db->whereIn('causer_id', auth()->user()->follower->pluck('id'));
//        }
        return view('edu.dynamic.index', compact('activitys'));
    }
}
