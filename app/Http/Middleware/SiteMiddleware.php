<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Route;
use App\Models\Site;
use UserService;
use Auth;

class SiteMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (request()->path() != 'api/site/site') {
            $site = request('site');
            $site = is_numeric($site) ? Site::find($site) : $site;
            if (!($site instanceof Site)) {
                abort(404, '站点不存在');
            }

            if (!UserService::isMaster($site, Auth::user())) {
                abort(403, '没有访问权限');
            }
        }
        return $next($request);
    }
}
