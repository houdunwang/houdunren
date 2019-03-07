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
        if (!\site(request('site'))) {
            abort(404, '站点不存在或域名没有绑定到模块');
        }
        config(['app.name' => \site()['name']]);
        return $next($request);
    }
}
