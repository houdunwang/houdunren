<?php

namespace App\Http\Middleware;

use App\Services\SiteService;
use Closure;

/**
 * 前台中间件
 * Class FrontMiddleware
 */
class MemberMiddleware
{
  public function handle($request, Closure $next)
  {
    $site = app(SiteService::class)->getSiteByDomain();
    if (!$site) {
      dd('域名不属于任何站点22');
    }
    site($site);
    return $next($request);
  }
}
