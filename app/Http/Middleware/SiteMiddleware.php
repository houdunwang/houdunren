<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->load();
        return $next($request);
    }

    protected function load()
    {
        $data = Config::find(1)?->value('data');
        if ($data) {
            config(['app.name' => $data['base']['name'] ?? config('app.name')]);
            config(['mail.mailers.smtp' => config('mail.mailers.smtp') + $data['email']]);
            foreach (config('hd') as $name => $value) {
                config(['hd.' . $name => ($data[$name] ?? []) + config('hd.' . $name)]);
            }
        }
    }
}
