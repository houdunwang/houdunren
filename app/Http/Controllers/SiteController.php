<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use App\Models\Site;
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
        $sites = $repository->paginate(20);
        return view('site.index', compact('sites'));
    }

    public function create()
    {
        return view('site.create');
    }

    public function store(SiteRequest $request, SiteRepository $repository)
    {
        $repository->create($request->input());
        return redirect(route('site.index'))->with('success', '站点创建成功');
    }

    public function show(Site $site, SiteRepository $siteRepository)
    {
        $siteRepository->cacheAdminSite($site);
        return view('site.show', compact('site'));
    }

    public function edit(Site $site)
    {
        return view('site.edit', compact('site'));
    }

    public function update(SiteRequest $request, Site $site, SiteRepository $repository)
    {
        $repository->update($site, $request->input());
        return redirect(route('site.index'))->with('success', '站点修改成功');
    }

    public function destroy(Site $site, SiteRepository $repository)
    {
        $this->authorize('delete', $site);
        $repository->delete($site);
        return back()->with('success', '站点删除成功');
    }

    public function access(Site $site)
    {
        return view('site.access', compact('site'));
    }

    public function users(Site $site)
    {
        return view('site.user', compact('site'));
    }
}
