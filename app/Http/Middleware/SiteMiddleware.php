<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Models\Site;
use SiteService;
use Closure;

/**
 * 站点中间件
 * @package App\Http\Middleware
 */
class SiteMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($site = request('site')) {
            $site = is_numeric($site) ? Site::find($site) : $site;
            if (!($site instanceof Site)) {
                abort(404, '站点不存在');
            }
            SiteService::cache($site);
        }
        return $next($request);
    }
}
