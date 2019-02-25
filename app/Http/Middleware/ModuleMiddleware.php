<?php

namespace App\Http\Middleware;

use App\Models\Module;
use App\Models\Site;
use App\Repositories\ModuleRepository;
use App\Repositories\SiteRepository;
use Closure;

class ModuleMiddleware
{
    public function handle($request, Closure $next)
    {
        $this->site();
        $this->module();
        if (!site()->user->contains(auth()->user())) {
            return redirect()->route('site.site.index')->with('error', '您没有模块的操作权限');
        }
        return $next($request);
    }

    protected function site()
    {
        if (!$site = Site::find(request('sid', 0))) {
            abort(404, '您访问的站点不存在');
        }
        \site($site);
    }

    protected function module()
    {
        if(!$module = Module::find(request('mid'))){
            abort(404, '您请求的模块不存在');
        }
        \module($module);
    }
}
