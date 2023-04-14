<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use App\Models\Notification as ModelsNotification;
use Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    //读取通知
    public function show(ModelsNotification $notification)
    {
        $notification->markAsRead();
    }

    //通知列表
    public function index(Request $request)
    {
        if ($request->type == 'unread') {
            return NotificationResource::collection(Auth::user()->unreadNotifications()->paginate(10));
        }
        return NotificationResource::collection(Auth::user()->notifications()->paginate(10));
    }
}
