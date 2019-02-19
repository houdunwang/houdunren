<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use App\Models\Site;
use App\Repositories\ModuleRepository;
use App\Repositories\SiteRepository;
use App\Repositories\UserRepository;
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
        return view('site.show', compact('site', 'modules'));
    }

    public function edit(Site $site)
    {
        $this->authorize('update', $site);
        return view('site.edit', compact('site'));
    }

    public function update(SiteRequest $request, Site $site, SiteRepository $repository)
    {
        $this->authorize('update', $site);
        $repository->update($site, $request->input());
        return redirect(route('site.index'))->with('success', '站点修改成功');
    }

    public function destroy(Site $site, SiteRepository $repository)
    {
        $this->authorize('delete', $site);
        $repository->delete($site);
        return back()->with('success', '站点删除成功');
    }

    /**
     * 站点套餐权限列表
     * @param Site $site
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function access(Site $site)
    {
        return view('site.access', compact('site'));
    }

    /**
     * 站点操作员列表
     * @param Site $site
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function users(Site $site)
    {
        $this->authorize('update', $site);
        $this->authorize('view', $site);
        return view('site.user', compact('site'));
    }

    /**
     * 设置站点操作员
     * @param Site $site
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function operator(Site $site)
    {
        $this->authorize('update', $site);
        $user = User::findOrFail(request('id'));
        $user->site()->toggle([$site['id'] => ['role' => 'operator']]);
        //删除操作员时同时移除权限数据
        if (!$site->user()->where('name', $user['name'])->first()) {
            $user->permissions()->detach($site->permissions->pluck('id')->toArray());
        }
        if (request()->expectsJson()) {
            return response()->json(['message' => '操作员设置成功', 'code' => 0]);
        } else {
            return back()->with('success', '操作员设置成功');
        }
    }
}
