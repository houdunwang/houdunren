<?php

namespace Modules\Edu\Http\Controllers\Member;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\User;
use Modules\Edu\Transformers\Front\LessonResource;

class LessonController extends ApiController
{
    public function index()
    {
        $lessons = User::find(Auth::id())->favoriteLesson()->paginate();
        return LessonResource::collection($lessons);
    }
}
