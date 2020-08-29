<?php

namespace App\Http\Middleware;

use App\Models\Site;
use App\Services\ConfigService;
use Closure;

class FrontMiddleware
{
  public function handle($request, Closure $next)
  {
    $this->init();
    return $next($request);
  }

  protected function init()
  {
    $info = parse_url(request()->url());
    $site = Site::where('domain', 'regexp', 'https?:\/\/' . $info['host'])->first();
    if ($site) {
      site($site);
      app(ConfigService::class)->loadSiteConfig();

      if ($this->module) {
        module($site->module['name']);
        app(ConfigService::class)->loadCurrentModuleConfig();
      }
    }
  }
}
