<?php

namespace App\Http\Controllers\Member;

use App\Servers\NotifyServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;
use App\Models\Validation;

/**
 * 用户通知
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

    /**
     * 发送验证码
     * @param Request $request
     * @param NotifyServer $notifyServer
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\ResponseHttpException
     */
    public function code(Request $request, NotifyServer $notifyServer)
    {
        $notifyServer->code($request->input('username'), 4);

        return response()->json([
            'message' => '验证码已经发送到 ' . $request->input('username') . ' 请注意查收',
            'code' => 0,
        ], 200);
    }
}
