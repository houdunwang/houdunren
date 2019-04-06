<?php

namespace App\Http\Controllers\User;

use App\Repositories\MenuRepository;
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
    public function follower(User $user)
    {
        $users = $user->followers()->paginate(10);
        return view('user.follower', compact('user', 'users'));
    }

    public function fans(User $user)
    {
        $users = $user->fans()->paginate(10);
        return view('user.fans', compact('user', 'users'));
    }
}
