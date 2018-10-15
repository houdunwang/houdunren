<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

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

    public function lists()
    {
        $lessons = EduLesson::with('user')->paginate(10);
        return view('edu.lesson_lists', compact('lessons'));
    }

}
