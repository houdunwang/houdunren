<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Lesson;
use Modules\Edu\Entities\Tag;

/**
 * 课程列表
 * @package Modules\Edu\Http\Controllers\Front
 */
class LessonController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show']);
  }

  public function index(Request $request)
  {
    $lessons = Lesson::search($request->query('w'))
      ->searchByTag($request->query('tag'))
      ->latest('id')
      ->paginate(12);
    $tags = Tag::all();
    return view('edu::front.lesson.index', compact('lessons', 'tags'));
  }

  public function show(Lesson $lesson)
  {
    return view('edu::front.lesson.show', compact('lesson'));
  }
}
