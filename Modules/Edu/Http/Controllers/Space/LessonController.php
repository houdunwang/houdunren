<?php

namespace Modules\Edu\Http\Controllers\Space;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Lesson;
use App\Models\User;
use Modules\Edu\Entities\User as EntitiesUser;

class LessonController extends Controller
{
  public function index(User $user)
  {
    $lessons = EntitiesUser::make($user['id'])
      ->FavoriteLessons()
      ->paginate();
    return view('edu::space.lesson', compact('lessons', 'user'));
  }
}
