<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Config;
use Auth;

class SystemMiddleware
{
  public function handle($request, Closure $next)
  {
    config(['admin' => Config::find(1)->config]);

    if (Auth::id() != 1) {
      return redirect()
        ->route('site.site.index')
        ->with('danger', '你没有操作权限');
    }

    return $next($request);
  }
}
