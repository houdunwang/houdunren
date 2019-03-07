<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Middleware;

use Closure;

/**
 * 系统管理
 * Class SystemMiddleware
 * @package App\Http\Middleware
 */
class SystemMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        if (!isSuperAdmin()) {
            return redirect()->route('admin')->with('error', '您不是超级管理站不允许执行此操作');
        }
        return $next($request);
    }
}
