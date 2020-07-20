<?php

namespace App\Http\Middleware;

use App\Services\ModuleService;
use Closure;

class FrontMiddleware
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
        $site = get_site_by_domain();
        site($site);
        module($site->module['name']);
        return $next($request);
    }
}
