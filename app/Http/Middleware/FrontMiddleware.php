<?php

namespace App\Http\Middleware;

use App\Services\SiteService;
use Closure;

/**
 * 前台中间件
 * Class FrontMiddleware
 */
class FrontMiddleware
{
  public function handle($request, Closure $next)
  {
    $site = app(SiteService::class)->getSiteByDomain();
    if (!$site) {
      dd('域名不属于任何站点');
    }
    config(['site' => site($site)['config']]);
    return $next($request);
  }
}
