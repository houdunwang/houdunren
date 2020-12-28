<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\Models\Site;
use App\Services\ModuleService;
use Illuminate\Http\Request;
use Inertia\Response;
use LogicException;
use RuntimeException;
use App\Http\Resources\SiteResource;

/**
 * 站点管理
 * @package App\Http\Controllers\Site
 */
class SiteController extends Controller
{
    public function __construct()
    {
        //权限验证
        $this->authorizeResource(Site::class, 'site');
    }

    /**
     * 站点列表
     * @return Response
     * @throws LogicException
     * @throws RuntimeException
     */
    public function index()
    {
        $sites = user()->isSuperAdmin ? Site::all() : user()->allSites;
        return inertia()->render('Site/Site/Index', ['sites' => SiteResource::collection($sites)]);
    }

    /**
     * 创建站点
     *
     * @param ModuleService $moduleService
     * @return void
     */
    public function create(ModuleService $moduleService)
    {
        $modules = $moduleService->allInstalled();
        $templates = user()->group->templates;
        return inertia()->render('Site/Site/Form', compact('modules'));
    }

    /**
     * 保存站点
     *
     * @param SiteRequest $request
     * @param Site $site
     * @return void
     */
    public function store(SiteRequest $request, Site $site)
    {
        $site->user_id = auth()->id();
        $site->config = [];

        $site->fill($request->input())->save();

        return redirect()->route('site.site.index')->with('success', '站点添加成功');
    }

    /**
     * 编辑站点
     *
     * @param Site $site
     * @param ModuleService $moduleService
     * @return void
     */
    public function edit(Site $site, ModuleService $moduleService)
    {
        $modules = $moduleService->allInstalled();
        $templates = user()->group->templates;
        return inertia()->render('Site/Site/Form', compact('modules', 'templates', 'site'));
    }

    /**
     * 更新站点
     *
     * @param SiteRequest $request
     * @param Site $site
     * @return void
     */
    public function update(SiteRequest $request, Site $site)
    {
        $site->user_id = auth()->id();
        $site->fill($request->input())->save();

        return redirect()->route('site.index.site')->with('success', '站点修改成功');
    }

    /**
     * 删除站点
     *
     * @param Site $site
     * @return void
     */
    public function destroy(Site $site)
    {
        $site->delete();
        return back()->with('success', '删除成功');
    }
}
