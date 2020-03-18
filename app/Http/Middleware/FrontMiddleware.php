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
    if (!$site->module) {
      dd('站点没有设置默认模块');
    }
    site($site);
    module(site()->module);
    return $next($request);
  }
}
