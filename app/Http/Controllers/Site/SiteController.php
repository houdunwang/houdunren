<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use App\Servers\Access;
use Illuminate\Http\Request;

class SiteController extends ApiController
{
    public function __construct()
    {
        $this->authorizeResource(Site::class, 'site');
    }

    /**
     * 获取站点列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $sites = auth()->user()->manageSites();
        return $this->success('站点列表获取成功', SiteResource::collection($sites));
    }

    public function store(SiteRequest $request, Site $site): \Illuminate\Http\JsonResponse
    {
        $site->fill($request->all())->save();
        $site->user()->attach(auth()->user(), ['role' => 'admin']);

        $this->flashAccessTable($site);
        return $this->success('站点添加成功');
    }

    public function show(Site $site): \Illuminate\Http\JsonResponse
    {
        return $this->success('站点获取成功', new SiteResource($site));
    }

    public function update(SiteRequest $request, Site $site): \Illuminate\Http\JsonResponse
    {
        $site->fill($request->all())->save();
        $this->flashAccessTable($site);

        return $this->success('站点修改成功', $site);
    }

    public function destroy(Site $site): \Illuminate\Http\JsonResponse
    {
        $site->delete();
        return $this->success('栏目删除成功');
    }

    /**
     * 刷新站点权限表
     * @param Site $site
     */
    protected function flashAccessTable(Site $site): void
    {
        (new Access())->updateSitePermission($site);
    }
}
