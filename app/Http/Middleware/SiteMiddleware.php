<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Config;

/**
 * 站点控制器
 * @package App\Http\Middleware
 */
class SiteMiddleware
{
  public function handle($request, Closure $next)
  {
    config(['admin' => Config::find(1)->config]);
    return $next($request);
  }
}
