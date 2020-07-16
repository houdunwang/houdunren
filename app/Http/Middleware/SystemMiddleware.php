<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Config;

class SystemMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        config(['admin' => Config::find(1)->config]);
        return $next($request);
    }
}
