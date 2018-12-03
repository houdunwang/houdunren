<?php

namespace App\Http\Controllers\Member;

use App\User;
use App\Http\Controllers\Controller;

class SpaceController extends Controller
{
    public function dynamic(User $user)
    {
        return view('member.space.dynamic', compact('user'));
    }

    public function fans(User $user)
    {
        return view('member.space.fans', compact('user'));
    }

    public function follower(User $user)
    {
        return view('member.space.follower', compact('user'));
    }
}
