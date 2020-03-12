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
    app(SiteService::class)->getByDomain();
    config(['site' => site()['config']]);
    return $next($request);
  }
}
