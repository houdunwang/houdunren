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

class HomeController extends Controller
{
    public function index( ActivityRepository $activityRepository, EduLessonRepository $eduLessonRepository)
    {
        dd(99999);
        return 31113;
//        $activities = \Cache::remember('activity', 1, function () use ($activityRepository) {
//            return $activityRepository->paginate(10);
//        });
//        $lessons = \Cache::remember('home_edu_lesson', 30, function () use ($eduLessonRepository) {
            return $eduLessonRepository->paginate(12);
//        });
        return view('edu.dynamic.index', compact('activities', 'lessons'));
    }
}
