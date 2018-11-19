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
use App\Repositories\ActivityRepository;
use App\Repositories\EduLessonRepository;

/**
 * 模块前台
 * Class HomeController
 * @package App\Http\Controllers\Edu
 */
class HomeController extends Controller
{
    /**
     * 主页
     * @param ActivityRepository $activityRepository
     * @param EduLessonRepository $eduLessonRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ActivityRepository $activityRepository, EduLessonRepository $eduLessonRepository)
    {
        $activities = $activityRepository->paginate(12);
        $lessons = $eduLessonRepository->paginate(12,['*'],'updated_at');

        return view('edu.dynamic.index', compact('activities', 'lessons'));
    }
}
