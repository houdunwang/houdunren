<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Models\Site;
use ConfigService;
use UserService;
use SiteService;
use Closure;
use Auth;


class SiteMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($site = request('site')) {
            $site = is_numeric($site) ? Site::find($site) : $site;
            if (!($site instanceof Site)) {
                abort(404, '站点不存在');
            }

            if (!UserService::isMaster($site, Auth::user())) {
                abort(403, '没有访问权限');
            }
            SiteService::cache($site);
            ConfigService::site($site);
        }
        return $next($request);
    }
}
