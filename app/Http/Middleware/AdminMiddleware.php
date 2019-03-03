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

class AdminMiddleware
{
    /**
     * 模块权限判断
     * @param $request
     * @param Closure $next
     * @param string $permission 多上权限以|分隔
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next, string $permission='')
    {
        if (!site()->user->contains(auth()->user())) {
            return redirect()->route('site.site.index')->with('error', '您没有模块的操作权限');
        }
        module_access(explode('|', $permission), \module(), true);

        return $next($request);
    }
}
