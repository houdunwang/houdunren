<?php

namespace Modules\Edu\Http\Controllers\Member;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\User as EntitiesUser;

class TopicController extends Controller
{
    public function index()
    {
        $topics = EntitiesUser::make(user('id'))
            ->topics()
            ->latest()
            ->paginate();
        return view('edu::member.topic', compact('topics'));
    }
}
