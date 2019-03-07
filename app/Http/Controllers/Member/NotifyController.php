<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;

/**
 * 用户通知管理
 * Class NotifyController
 * @package App\Http\Controllers\Member
 */
class NotifyController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications()->paginate(20);
        return view('member.notify.index', compact('notifications'));
    }

    public function all()
    {
        $notifications = auth()->user()->notifications()->paginate(20);
        return view('member.notify.index', compact('notifications'));
    }

    /**
     * 查看通知
     * @param DatabaseNotification $notify
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show(DatabaseNotification $notify)
    {
        $notify->markAsRead();
        return redirect($notify['data']['url']);
    }

    /**
     * @param DatabaseNotification $notify
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(DatabaseNotification $notify)
    {
        $notify->delete();
        return back();
    }
}
