<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Repositories\ModuleRepository;

/**
 * 站点管理
 * Class SiteController
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{
    /**
     * 站点管理主页
     * @param Site $site
     * @param ModuleRepository $moduleRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Site $site, ModuleRepository $moduleRepository)
    {
        $this->authorize('view', $site);
        $modules = $moduleRepository->getSiteModulesByUser($site, auth()->user());
        if (!count($modules)) {
            return redirect(route('system.site.index'))->with('error', '站点没有安装任何模块');
        }
        return view('site.site.show', compact('site', 'modules'));
    }

    /**
     * 站点维护
     */
    public function close()
    {
        return view('site.site.close');
    }
}
