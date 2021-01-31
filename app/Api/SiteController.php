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
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->middleware(['site'])->except('index');
    }

    /**
     * 站点列表
     * @return void
     */
    public function index()
    {
        $user = Auth::user();
        $sites = UserService::isSuperAdmin($user) ? Site::all() : $user->allSites;
        return SiteResource::collection($sites);
    }

    public function show(Site $site)
    {
        $this->authorize('view', $site);
        return new SiteResource($site);
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
     * 更新站点
     *
     * @param SiteRequest $request
     * @param Site $site
     * @return void
     */
    public function update(SiteRequest $request, Site $site)
    {
        $this->authorize('update', $site);
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
        return ['message' => '删除成功'];
    }
}
