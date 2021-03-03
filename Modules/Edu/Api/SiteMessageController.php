<?php

namespace Modules\Edu\Api;

use Modules\Edu\Transformers\SiteMessageResource;
use App\Http\Controllers\Controller;
use App\Models\Site;
use Auth;
use DB;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use InvalidArgumentException;
use RuntimeException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Notifications\DatabaseNotification;

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

    /**
     * 获取通知
     * @return AnonymousResourceCollection
     * @throws InvalidArgumentException
     * @throws RuntimeException
     * @throws BindingResolutionException
     */
    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate();
        return SiteMessageResource::collection($notifications);
    }

    /**
     * 阅读消息
     * @param mixed $message
     * @return void
     */
    public function destroy(Site $site, $message)
    {
        DatabaseNotification::where('id', $message)->delete();
    }
}
