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
    /**
     * 个人空间
     * @param User $user
     * @param ActivityServer $activityServer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user, ActivityServer $activityServer, MenuRepository $menuRepository)
    {
        $menus = $menuRepository->first(site(), 'user_pc');
//        dd($menus);
        $url = $menus['url'] . '&uid=' . $user['id'];
        return redirect($url);
        $activities = $activityServer->getByUser($user)->latest()->paginate(10);
        return view('user.show', compact('user', 'activities'));
    }
}
