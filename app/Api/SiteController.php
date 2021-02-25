<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteResource;
use App\Http\Requests\SiteRequest;
use Illuminate\Http\Request;
use App\Models\Site;
use Auth;

/**
 * 站点管理
 * @package App\Http\Controllers\Site
 */
class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['show', 'current']);
        $this->middleware(['module'])->only(['current']);
    }

    /**
     * 当前站点
     * @return null|Site
     */
    public function current()
    {
        $site = site()->toArray();
        $site['config'] = ['abc'];
        return $site;
    }

    /**
     * 站点列表
     * @return void
     */
    public function index()
    {
        $sites = Auth::user()->sites->load('master.group.packages.modules');
        // return $sites;
        return SiteResource::collection($sites);
    }

    /**
     * 获取单个站点
     * @param Site $site
     * @return void
     */
    public function show(Site $site)
    {
        return new SiteResource($site);
    }

    /**
     * 保存站点
     * @param SiteRequest $request
     * @param Site $site
     * @return void
     */
    public function store(SiteRequest $request, Site $site)
    {
        $this->authorize('update', $site);
        $site->fill($request->input());
        $site->user_id = auth()->id();
        $site->config = [];
        $site->module_id = request('module_id');
        $site->save();
        return $this->message('添加成功');
    }

    /**
     * 更新站点
     * @param SiteRequest $request
     * @param Site $site
     * @return void
     */
    public function update(SiteRequest $request, Site $site)
    {
        $this->authorize('update', $site);
        $site->fill($request->input());
        $site->module_id = request('module_id');
        $site->save();
        return $this->message('站点修改成功');
    }

    /**
     * 删除站点
     * @param Site $site
     * @return void
     */
    public function destroy(Site $site)
    {
        $this->authorize('update', $site);
        $site->delete();
        return $this->message('删除成功');
    }
}
