<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Edu\Entities\Lesson;
use Modules\Edu\Transformers\Front\LessonResource;

/**
 * 前台课程
 * @package Modules\Edu\Http\Controllers\Front
 */
class LessonController extends ApiController
{
  public function index()
  {
    $lessons = Lesson::latest('id')->paginate(9);
    return LessonResource::collection($lessons);
  }

  public function show(Lesson $lesson)
  {
    return response()->json(new LessonResource($lesson));
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Response
   */
  public function edit($id)
  {
    return view('edu::edit');
  }

  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param int $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }
}
