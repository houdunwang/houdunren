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
        return view('edu.home_index');
    }

    /**
     * 动态
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dynamic(Request $request)
    {
        $db = Activity::latest();
        if ($request->query('t') == 'follow') {
            $db->whereIn('causer_id', auth()->user()->follower->pluck('id'));
        }
        $activitys = $db->paginate(10);
        return view('edu.home_dynamic', compact('activitys'));
    }
}
