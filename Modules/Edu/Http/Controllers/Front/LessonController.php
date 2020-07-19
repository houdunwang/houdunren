<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Lesson;
use Modules\Edu\Entities\Tag;

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
      ->paginate();
    $tags = Tag::all();
    return view('edu::lesson_front.index', compact('lessons', 'tags'));
  }

  public function show(Lesson $lesson)
  {
    return view('edu::lesson_front.show', compact('lesson'));
  }
}
