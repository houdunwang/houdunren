<?php

namespace App\Http\Middleware;

use App\Models\Site;
use App\Services\ConfigService;
use App\Services\TemplateService;
use Closure;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;

/**
 * 前台管理中间件
 * @package App\Http\Middleware
 */
class FrontMiddleware
{
  public function handle($request, Closure $next)
  {
    $this->init();
    return $next($request);
  }

  /**
   * 初始化站点与模块数据
   * @return void
   * @throws BindingResolutionException
   * @throws SuspiciousOperationException
   */
  protected function init()
  {
    //根据域名获取站点
    $info = parse_url(request()->url());
    $site = Site::where('domain', 'regexp', 'https?:\/\/' . $info['host'])->first();

    if ($site) {
      //加载站点配置
      app(ConfigService::class)->loadSiteConfig(site($site));

      //加载模块配置
      app(ConfigService::class)->loadCurrentModuleConfig(module($site->module['name']));

      //设置文章模块模板路径
      if (module()['name'] == 'Article') {
        app(TemplateService::class)->template(site());
      }
    }
  }
}
