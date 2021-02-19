<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Auth;
use Modules\Edu\Transformers\MessageResource;
use DB;

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

    /**
     * 阅读消息
     * @param mixed $message
     * @return void
     */
    public function destroy($message)
    {
        DB::table('notifications')->where('id', $message)->delete();
    }
}
