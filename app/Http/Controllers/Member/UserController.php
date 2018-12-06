<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Member;

use App\Http\Requests\UserRequest;
use App\Repositories\ActivityRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('admin:Admin-user', ['only' => ['index']]);
    }

    /**
     * 后台会员列表
     * @param Request $request
     * @param UserRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, UserRepository $repository)
    {
        $users = $repository->member($request->query('w'));

        return view('member.user.index', compact('users'));
    }

    /**
     * 个人主页
     * @param User $user
     * @param ActivityRepository $activityRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user, ActivityRepository $activityRepository)
    {
        $activities = $activityRepository->userPaginateList($user, 10);
        return view('member.space.dynamic', compact('user', 'activities'));
    }

    //关注列表
    public function follower(User $user)
    {
        $this->authorize('fans', $user);
        $follows = $user->follower()->paginate(10);
        return view('member.follower', compact('user', 'follows'));
    }

    /**
     * 粉丝列表
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function fans(User $user)
    {
        $this->authorize('fans', $user);
        $fans = $user->fans()->paginate(10);
        return view('member.fans', compact('user', 'fans'));
    }

    public function edit(User $user, Request $request)
    {
        $this->authorize('update', $user);
        return view('member.user.' . $request->query('type'));
    }

    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $data = $request->all();
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        return back()->with('success', '资料修改成功');
    }

    //消息列表
    public function notification()
    {
        $notifications = auth()->user()->unreadNotifications;
        return view('member.notification_index', compact('notifications'));
    }

    //前台关注
    public function follow(User $user)
    {
        $this->authorize('follow', $user);

        $followers = auth()->user()->follower()->toggle([$user->id]);
        if (in_array($user->id, $followers['attached'])) {
            activity()
                ->performedOn($user)
                ->causedBy(auth()->user())
                ->log('follower');
        } else {
            //取关
            $user->activity()->where('causer_id', auth()->id())->delete();
        }
        return back();
    }
}
