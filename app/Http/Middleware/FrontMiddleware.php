<?php

namespace App\Http\Middleware;

use App\Models\Site;
use App\Services\ArticleService;
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

      if ($site->article) {
        app(ArticleService::class)->init($site);;
      } else if ($site->module) {
        module($site->module['name']);
        app(ConfigService::class)->loadCurrentModuleConfig();
      }
    }
  }
}
