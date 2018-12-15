<?php

namespace App\Http\Controllers\Member;

use App\Repositories\ActivityRepository;
use App\User;
use App\Http\Controllers\Controller;

class SpaceController extends Controller
{
    public function dynamic(User $user,ActivityRepository $activityRepository)
    {
        $activities = $activityRepository->userPaginateList($user, 10);
        return view('member.space.dynamic', compact('user','activities'));
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
