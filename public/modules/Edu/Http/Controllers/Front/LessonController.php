<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Lesson;
use Modules\Edu\Entities\Tag;
use Modules\Edu\Entities\TagRelation;
use Modules\Edu\Transformers\Front\LessonResource;

/**
 * 前台课程
 * @package Modules\Edu\Http\Controllers\Front
 */
class LessonController extends ApiController
{
    public function index(Request $request)
    {
        $tag = $request->query('tag');
        $searchWord = $request->query('w');
        if ($searchWord) {
            $lessons = Lesson::where('title', 'like', "%{$searchWord}%")->paginate(9);
        } else if ($tag) {
            $lessons = Tag::find($tag)->lesson()->paginate(9);
        } else {
            $lessons = Lesson::latest('id')->paginate(9);
        }
        return LessonResource::collection($lessons);
    }

    public function show(Lesson $lesson)
    {
        return response()->json(new LessonResource($lesson));
    }
    /**
     * 点赞
     * @param Video $video
     * @return JsonResponse
     */
    public function favour(Lesson $lesson)
    {
        $lesson->favour()->toggle(Auth::id());
        $lesson['favour_count'] =  $lesson->favour()->count();
        $lesson->save();
        return $this->json(new LessonResource($lesson));
    }
    /**
     * 收藏
     * @param Video $video
     * @return JsonResponse
     */
    public function favorite(Lesson $lesson)
    {
        $lesson->favorite()->toggle(Auth::id());
        $lesson->favorite_count = $lesson->favorite()->count();
        $lesson->save();
        return $this->json(new LessonResource($lesson));
    }
}
