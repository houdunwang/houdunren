<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class DynamicController extends Controller
{
    public function index(Request $request)
    {
        $db = Activity::latest('updated_at');
        if ($request->query('t') == 'follow') {
            $db->whereIn('causer_id', auth()->user()->follower->pluck('id'));
        }
        $activitys = $db->paginate(10);
        return view('edu.dynamic.index', compact('activitys'));
    }
}
