<?php

namespace Modules\Edu\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notifications = user()->unreadNotifications()->where('site_id', site()['id'])->paginate();
        return view('edu::member.message', compact('notifications'));
    }

    public function show(string $id)
    {
        $notification = user()->notifications()->where('id', $id)->first();
        $notification->markAsRead();
        return redirect($notification->data['link']);
    }
}
