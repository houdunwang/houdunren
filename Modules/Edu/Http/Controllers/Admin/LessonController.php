<?php

namespace Modules\Edu\Http\Controllers\Admin;

use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Lesson;
use Modules\Edu\Entities\Tag;
use Modules\Edu\Entities\Video;
use Modules\Edu\Http\Requests\LessonRequest;

class LessonController extends Controller
{
  public function index()
  {
    $lessons = Lesson::latest()->paginate();

    return view('edu::admin.lesson.index', compact('lessons'));
  }

  public function create(Lesson $lesson)
  {
    $tags = Tag::all();
    return view('edu::admin.lesson.create', compact('lesson', 'tags'));
  }

  public function store(LessonRequest $request, Lesson $lesson)
  {
    $lesson->fill($request->except(['file', 'tags', 'videos']));
    $lesson->user_id = user('id');
    $lesson->site_id = site()['id'];
    $lesson->save();
    $lesson->tags()->sync($request->tags);

    $this->updateVideos($lesson, $request);

    return redirect()->route('Edu.admin.lesson.index')->with('success', '课程添加成功');
  }

  public function edit(Lesson $lesson)
  {
    $tags = Tag::all();
    return view('edu::admin.lesson.edit', compact('tags', 'lesson'));
  }

  public function update(Request $request, Lesson $lesson)
  {
    $lesson->fill($request->except(['file', 'tags', 'videos']));
    $lesson->save();
    $lesson->tags()->sync($request->tags);
    $this->updateVideos($lesson, $request);
    return redirect()->route('Edu.admin.lesson.index')->with('success', '课程修改成功');
  }

  protected function updateVideos(Lesson $lesson, $request)
  {
    $videos = json_decode($request->videos, true);

    $lesson->videos()->whereNotIn('id', collect($videos)->pluck('id'))->delete();

    foreach ($videos as $rank => $video) {
      if ($video['title'] && $video['path']) {
        Video::updateOrCreate(['id' => $video['id']], array_merge($video, [
          'site_id' => site()['id'],
          'lesson_id' => $lesson['id'],
          'rank' => $rank
        ]));
      }
    }
  }

  public function destroy(Lesson $lesson)
  {
    $lesson->delete();
    return response()->json(['message' => '课程删除成功']);
  }

  public function search(Request $request)
  {
    if ($title = $request->title) {
      $lessons = Lesson::where('title', 'like', "%{$title}%")->paginate();
    } else {
      $lessons = Lesson::paginate();
    }
    return $lessons;
  }
}
