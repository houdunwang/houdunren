<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteResource;
use App\Http\Requests\SiteRequest;
use Illuminate\Http\Request;
use App\Models\Site;
use Auth;
use SiteService;

/**
 * 站点管理
 * @package App\Http\Controllers\Site
 */
class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['getByDomain']);
        $this->middleware(['site'])->except(['index', 'store', 'getByDomain']);
    }

    /**
     * 站点列表
     * @return void
     */
    public function index()
    {
        $sites = Auth::user()->allSites;
        return SiteResource::collection($sites);
    }

    /**
     * 根据域名获取站点
     * @return void
     */
    public function getByDomain()
    {
        return new SiteResource(SiteService::getByDomain());
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
     *
     * @param SiteRequest $request
     * @param Site $site
     * @return void
     */
    public function store(SiteRequest $request, Site $site)
    {
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
        $site->fill($request->input());
        $site->module_id = request('module_id');
        $site->save();
        return $this->message('站点修改成功');
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
