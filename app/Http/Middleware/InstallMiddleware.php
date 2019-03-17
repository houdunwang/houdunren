<?php

namespace App\Http\Middleware;

use Closure;

class InstallMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!is_file(base_path('install.lock')) && !if_route_pattern('install*')) {
            return redirect(route('install.home'));
        }
        if (is_file(base_path('install.lock')) && if_route_pattern('install*')){
            return redirect('/admin');
        }
        return $next($request);
    }
}
