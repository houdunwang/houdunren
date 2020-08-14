<?php

namespace App\Http\Middleware;

use App\Services\ConfigService;
use App\Services\ModuleService;
use Closure;

class FrontMiddleware
{
    public function handle($request, Closure $next)
    {
        $site = get_site_by_domain();
        site($site);

        module($site->module['name']);

        app(ConfigService::class)->loadSiteConfig();
        app(ConfigService::class)->loadCurrentModuleConfig();

        return $next($request);
    }
}
