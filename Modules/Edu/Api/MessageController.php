<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Auth;
use Modules\Edu\Transformers\MessageResource;

/**
 * 站内消息
 * @package Modules\Edu\Api
 */
class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        $notifications = Auth::user()->unreadNotifications()->paginate();
        return MessageResource::collection($notifications);
    }

    public function destroy($message)
    {
        Auth::user()->notifications->where('id', $message)->first()->markAsRead();
    }
}
