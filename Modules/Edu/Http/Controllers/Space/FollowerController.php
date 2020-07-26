<?php

namespace Modules\Edu\Http\Controllers\Space;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\User;
use Modules\Edu\Entities\User as EntitiesUser;

class FollowerController extends Controller
{
  public function index(User $user)
  {
    $followers = EntitiesUser::make($user['id'])
      ->followers()
      ->paginate(16);
    return view('edu::space.follower', compact('followers', 'user'));
  }
}
