<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Route;
use Symfony\Component\HttpFoundation\Response;

class SiteMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $this->load();
        return $next($request);
    }

    protected function load()
    {
        $data = Config::find(1)?->value('data');
        if ($data) {
            foreach (config('hd') as $name => $value) {
                config(['hd.' . $name => ($data[$name] ?? []) + config('hd.' . $name)]);
            }
            config(['app.name' => $data['base']['name'] ?? config('app.name')]);
            config(['app.url' => URL::previous()]);
            config(['mail.mailers.smtp' => config('mail.mailers.smtp') + $data['email']]);
        }
    }
}
