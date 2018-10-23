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
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    //会员中心
    public function show(User $user)
    {

        return view('member.user_show', compact('user'));
    }

    //关注列表
    public function follower(User $user)
    {
        $this->authorize('fans', $user);
        $follows = $user->follower()->paginate(1);
        return view('member.follower', compact('user', 'follows'));
    }

    //粉丝列表
    public function fans(User $user)
    {
        $this->authorize('fans', $user);
        $fans = $user->fans()->paginate(1);
        return view('member.fans', compact('user', 'fans'));
    }

    public function edit(User $user, Request $request)
    {
        $this->authorize('update', $user);
        return view('member.' . $request->query('type'));
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
        auth()->user()->follower()->toggle([$user->id]);
        return back();
    }
}
