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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (!$this->checkAccess()) {
            return back()->with('message', '你没有操作权限');
        }
        config(['admin' => Config::find(1)->config]);
        return $next($request);
    }

    /**
     * 站点权限检测
     *
     * @return void
     */
    protected function checkAccess()
    {
        $site = request()->site;
        return $site ? $this->isMaster($site) : true;
    }

    /**
     * 站长检测
     *
     * @return boolean
     */
    protected function isMaster($site)
    {
        return Auth::user()->isSuperAdmin || $site->master->id == Auth::id();
    }
}
