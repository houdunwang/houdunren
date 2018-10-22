<?php

namespace App\Http\Controllers\Edu;

use AliyunMNS\Topic;
use App\Models\EduTopic;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = User::find($request->query('id'));
        return redirect(route('edu.user.topic', $user));
//        return view('edu.user.index', compact('user'));
    }

    public function topic(User $user)
    {
        $topics = EduTopic::where('user_id', $user['id'])->paginate(10);
        return view('edu.user.topic', compact('topics', 'user'));
    }
}
