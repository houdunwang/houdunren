<?php

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
use App\Models\EduTopic;
use App\Repositories\EduLessonRepository;
use App\Repositories\EduTopicRepository;
use App\Repositories\FavoriteRepository;
use App\User;

class SpaceController extends Controller
{
    public function topic(User $user, EduTopicRepository $repository)
    {
        $topics = $repository->paginateByUser($user, 10);
        return view('edu.space.topic', compact('user', 'topics'));
    }

    public function lesson(User $user, FavoriteRepository $repository)
    {
        $favorites = $repository->lessonPaginateList($user, 10);
        return view('edu.space.lesson', compact('user', 'favorites'));
    }
}