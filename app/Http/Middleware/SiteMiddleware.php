<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Config;
use Illuminate\Support\Facades\Auth;

/**
 * 站点控制器
 * @package App\Http\Middleware
 */
class SiteMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$this->checkAccess()) {
            return redirect()->route('site.site.index')->with('message', '你没有操作权限');
        }
        config(['admin' => Config::find(1)->config]);
        return $next($request);
    }

    /**
     * 站点权限检测
     *
     * @return boolean
     */
    protected function checkAccess(): bool
    {
        if (!Auth::check()) return false;

        $site = request()->site;
        return $site ? $this->isMaster($site) : true;
    }

    /**
     * 站长检测
     *
     * @return boolean
     */
    protected function isMaster($site): bool
    {
        return Auth::user()->isSuperAdmin || $site->master->id == Auth::id();
    }
}
