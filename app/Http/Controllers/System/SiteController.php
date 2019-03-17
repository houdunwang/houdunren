<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\Models\Site;
use App\Models\SiteUser;
use App\Repositories\ModuleRepository;
use App\Repositories\SiteRepository;

/**
 * 站点管理
 * Class SiteController
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{
    public function index(SiteRepository $repository)
    {
        $sites = $repository->paginate(20);
        return view('system.site.index', compact('sites'));
    }

    public function create()
    {
        return view('system.site.create');
    }

    public function store(SiteRequest $request, SiteRepository $repository)
    {
        $repository->create($request->input());
        return redirect(route('system.site.index'))->with('success', '站点创建成功');
    }

    public function edit(Site $site)
    {
        $this->authorize('update', $site);
        return view('system.site.edit', compact('site'));
    }

    /**
     * 更新站点
     * @param SiteRequest $request
     * @param Site $site
     * @param SiteRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(SiteRequest $request, Site $site, SiteRepository $repository)
    {
        $this->authorize('update', $site);
        $repository->update($site, $request->input());
        return redirect(route('system.site.index'))->with('success', '站点修改成功');
    }

    public function destroy(Site $site, SiteRepository $repository)
    {
        $this->authorize('delete', $site);
        $repository->delete($site);
        return back()->with('success', '站点删除成功');
    }
}
