<?php

namespace App\Http\Controllers\User;

use App\Servers\ActivityServer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 个人空间
 * Class HomeController
 * @package App\Http\Controllers\User
 */
class HomeController extends Controller
{
    public function show(User $user, ActivityServer $activityServer)
    {
        $activities = $activityServer->getByUser($user)->latest()->paginate(10);
        return view('user.show', compact('user', 'activities'));
    }
}
