<?php

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
use App\Repositories\ActivityRepository;
use App\Repositories\EduLessonRepository;
use App\Repositories\EduTopicRepository;

/**
 * 动态
 * Class DynamicController
 * @package App\Http\Controllers\Edu
 */
class DynamicController extends Controller
{
    /**
     * 动态列表
     * @param ActivityRepository $activityRepository
     * @param EduLessonRepository $eduLessonRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(
        ActivityRepository $activityRepository,
        EduLessonRepository $eduLessonRepository,
        EduTopicRepository $repository
    ) {
        $topics = $repository->recommendLists();
        $activities = $activityRepository->paginate(12);
        $lessons = $eduLessonRepository->commend(12);
        return view('edu.dynamic.index', compact('activities', 'lessons', 'topics'));
    }
}
