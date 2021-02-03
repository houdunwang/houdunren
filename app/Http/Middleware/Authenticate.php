<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            // $path = parse_url($request->fullUrl());
            // preg_match('/^\/(.*)\/?/i', $path['path'], $match);
            // if (in_array($match[1], ['admin', 'system', 'site'])) {
            //     return route('hdcms');
            // }
            return route('login');
        }
    }
}
