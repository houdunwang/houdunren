<?php

namespace Modules\Edu\Api;

use Modules\Edu\Transformers\SiteMessageResource;
use App\Http\Controllers\Controller;
use App\Models\Site;
use Auth;
use DB;

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
