<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Config;

class SiteMiddleware
{
  public function handle($request, Closure $next)
  {
    config(['admin' => Config::find(1)->config]);
    return $next($request);
  }
}
