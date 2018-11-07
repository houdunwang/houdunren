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

use App\Http\Controllers\Controller;
use App\Models\EduLesson;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        $activitys = Activity::latest('updated_at')->paginate(10);
        $lessons = EduLesson::with('user')->latest()->where('video_num','>',0)->paginate(12);
        return view('edu.dynamic.index', compact('activitys','lessons'));
    }
}
