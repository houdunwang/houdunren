<?php

namespace Modules\Edu\Http\Controllers\Space;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\User;
use Modules\Edu\Entities\User as EntitiesUser;
class FavoriteTopicController extends Controller
{
  public function index(User $user)
  {
    $topics = EntitiesUser::make($user['id'])
      ->FavoriteTopic()
      ->paginate();
    return view('edu::space.favorite_topic', compact('topics', 'user'));
  }
}
