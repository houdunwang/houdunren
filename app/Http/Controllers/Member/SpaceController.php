<?php

namespace App\Http\Controllers\Member;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpaceController extends Controller
{
    public function fans(User $user)
    {
        return view('member.space.fans', compact('user'));
    }
    public function follower(User $user)
    {
        return view('member.space.follower', compact('user'));
    }
}
