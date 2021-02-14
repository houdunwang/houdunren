<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Route;
use App\Models\Site;

class SiteMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (request()->is('site/*') && request()->path() != 'site/site/index') {
            if (!(request()->site instanceof Site)) {
                abort(403, '站点不存在');
            }
        }
        return $next($request);
    }
}
