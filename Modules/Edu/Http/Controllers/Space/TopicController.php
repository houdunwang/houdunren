<?php

namespace Modules\Edu\Http\Controllers\Space;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\User;
use Modules\Edu\Entities\User as EntitiesUser;

class TopicController extends Controller
{
    public function index(User $user)
    {
        $topics = EntitiesUser::make($user['id'])
            ->topics()
            ->with('user')
            ->latest()
            ->paginate(8);
        return view('edu::space.topic', compact('user', 'topics'));
    }
}
