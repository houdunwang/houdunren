<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\Models\Site;
use App\Repositories\ModuleRepository;
use App\Repositories\SiteRepository;
use App\User;

/**
 * 站点管理
 * Class SiteController
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{
    public function index(SiteRepository $repository)
    {
$d=         simplexml_load_string(file_get_contents('wechat.xml'), 'SimpleXMLElement',
            LIBXML_NOCDATA);
        var_dump($d->FromUserName);die;
        $sites = $repository->paginate(20);
        return view('site.site.index', compact('sites'));
    }

    public function create()
    {
        return view('site.site.create');
    }

    public function store(SiteRequest $request, SiteRepository $repository)
    {
        $repository->create($request->input());
        return redirect(route('site.site.index'))->with('success', '站点创建成功');
    }

    /**
     * 站点管理主页
     * @param Site $site
     * @param SiteRepository $siteRepository
     * @param ModuleRepository $moduleRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Site $site, SiteRepository $siteRepository, ModuleRepository $moduleRepository)
    {
        $this->authorize('view', $site);
        $siteRepository->cacheAdminSite($site);
        $modules = $moduleRepository->getSiteModulesByUser($site, auth()->user());
        if (!count($modules)) {
            return back()->with('error', '站点没有模块可使用或你没有操作权限');
        }
        return view('site.site.show', compact('site', 'modules'));
    }

    public function edit(Site $site)
    {
        $this->authorize('update', $site);
        return view('site.site.edit', compact('site'));
    }

    public function update(SiteRequest $request, Site $site, SiteRepository $repository)
    {
        $this->authorize('update', $site);
        $repository->update($site, $request->input());
        return redirect(route('site.site.index'))->with('success', '站点修改成功');
    }

    public function destroy(Site $site, SiteRepository $repository)
    {
        $this->authorize('delete', $site);
        $repository->delete($site);
        return back()->with('success', '站点删除成功');
    }
}
