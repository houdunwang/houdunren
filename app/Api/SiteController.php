<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteResource;
use App\Http\Requests\SiteRequest;
use Illuminate\Http\Request;
use App\Models\Site;
use ModuleService;
use UserService;
use Auth;

/**
 * 站点管理
 * @package App\Http\Controllers\Site
 */
class SiteController extends Controller
{
    /**
     * 站点列表
     *
     * @return void
     */
    public function index()
    {
        $user = Auth::user();
        $sites = UserService::isSuperAdmin($user) ? Site::all() : $user->allSites;
        return SiteResource::collection($sites);
    }

    /**
     * 创建站点
     *
     * @return void
     */
    public function create()
    {
        $modules = ModuleService::allInstalled();
        $templates = Auth::user()->group->templates;
        return ['message' => '添加成功'];
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
        return ['message' => '添加成功', 'site' => $site];
    }

    /**
     * 编辑站点
     *
     * @param Site $site
     * @return void
     */
    public function edit(Site $site)
    {
        $modules = ModuleService::allInstalled();
        $templates = Auth::user()->group->templates;
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
        return ['message' => '站点修改成功', 'site' => $site];
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
