<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Middleware;

use App\Models\Domain;
use App\Models\Module;
use App\Models\Site;
use Closure;

/**
 * 后台站点
 * Class SiteMiddleware
 * @package App\Http\Middleware
 */
class SiteMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('system.login.show');
        }
        $site = request('site');
        if (!\site(is_numeric($site) ? Site::findOrFail($site) : $site)) {
            abort(404, '您访问的站点不存在');
        }
        config(['app.name' => \site()['name']]);
        if (!\site()->isManage(auth()->user())) {
            abort(403, '您不是站点的管理员或操作员');
        }
        return $next($request);
    }
}
