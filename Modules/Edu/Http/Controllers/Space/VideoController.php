<?php

namespace Modules\Edu\Http\Controllers\Space;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\User;
use Modules\Edu\Entities\User as EntitiesUser;

class VideoController extends Controller
{
  public function index(User $user)
  {
    $videos = EntitiesUser::make($user['id'])
      ->FavoriteVideos()
      ->paginate();
    return view('edu::space.video', compact('videos', 'user'));
  }
}
