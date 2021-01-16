<?php

namespace App\Http\Middleware;

use App\Models\Site;
use ConfigService;
use SiteService;
use TagService;
use TemplateService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;

use Closure;

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
        $site = SiteService::getByDomain();

        if ($site) {
            //加载站点配置
            ConfigService::site(site($site));
            //加载模块配置
            //app(ConfigService::class)->loadCurrentModuleConfig(module($site->module['name']));
            //设置文章模块模板路径
            // if (module() && module()['name'] == 'Article') {
            //     app(TemplateService::class)->template(site());
            //     app(TagService::class)->make();
            // }
        }
    }
}
