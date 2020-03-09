<?php

namespace Modules\Edu\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Modules\Edu\Entities\Lesson;
use Modules\Edu\Http\Requests\LessonRequest;
use Modules\Edu\Services\LessonService;
use Modules\Edu\Transformers\LessonResource;

class LessonController extends ApiController
{
  public function __construct()
  {
  }

  public function index()
  {
    $lessons = Lesson::orderBy('id', 'desc')->where('site_id', site()['id'])->paginate(10);
    return LessonResource::collection($lessons);
  }

  /**
   * 搜索课程
   * @param Request $request
   *
   * @return void
   */
  public function search(Request $request)
  {
    $title = $request->input('title');
    $lessons = Lesson::orderBy('id', 'desc')->when($title, function ($query, $title) {
      return $query->where('title', 'like', "%{$title}%");
    })->limit(10)->latest()->get();
    return $this->success('课程列表', LessonResource::collection($lessons));
  }

  /**
   * 添加课程
   * @param Request $request
   * @param Lesson $lesson
   *
   * @return ResponseJson
   */
  public function store(LessonRequest $request, LessonService $lessonService)
  {
    $lessonService->create(site(), auth()->user(), $request->all());
    return $this->success('课程添加成功');
  }

  public function edit(Lesson $lesson)
  {
    return $this->success('获取课程', new LessonResource($lesson));
  }

  public function update(LessonRequest $request, Lesson $lesson, LessonService $lessonService)
  {
    $lessonService->update($lesson, $request->all());
    return $this->success('更新成功');
  }

  public function destroy(Lesson $lesson, LessonService $lessonService)
  {
    $lessonService->delete($lesson);
    return $this->success('删除成功');
  }
}
