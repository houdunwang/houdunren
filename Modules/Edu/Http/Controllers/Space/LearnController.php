<?php

namespace Modules\Edu\Http\Controllers\Space;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\User as EntitiesUser;

class LearnController extends Controller
{
  public function index(User $user)
  {
    $videos = EntitiesUser::make($user['id'])
      ->videos()
      ->paginate();
    return view('edu::space.learn', compact('videos', 'user'));
  }
}
