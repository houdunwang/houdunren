<?php

namespace App\Http\Middleware;

use Closure;

class UserTokenMiddleware
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
        if (auth()->check() && auth()->user()->email_valid == 0) {
            return redirect()->route('user.show_token');
        }
        return $next($request);
    }
}
