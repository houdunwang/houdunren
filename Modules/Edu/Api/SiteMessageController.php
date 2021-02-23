<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Auth;
use Modules\Edu\Transformers\SiteMessageResource;
use DB;
use App\Models\Site;

/**
 * 站内消息
 * @package Modules\Edu\Api
 */
class SiteMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        $notifications = Auth::user()->unreadNotifications()->paginate();
        return SiteMessageResource::collection($notifications);
    }

    /**
     * 阅读消息
     * @param mixed $message
     * @return void
     */
    public function destroy(Site $site, $message)
    {
        DB::table('notifications')->where('id', $message)->delete();
    }
}
