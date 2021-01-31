<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Config;
use Illuminate\Support\Facades\Auth;
use UserService;

/**
 * 站点控制器
 * @package App\Http\Middleware
 */
class SiteMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$this->checkAccess()) {
            abort(403, '你没有操作权限');
        }
        return $next($request);
    }

    /**
     * 站点权限检测
     *
     * @return boolean
     */
    protected function checkAccess(): bool
    {
        if ($site = request()->site) {
            return  UserService::isMaster($site, Auth::user());
        }
        return false;
    }
}
