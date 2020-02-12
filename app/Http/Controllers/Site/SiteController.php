<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use App\Models\SiteUser;
use App\Servers\Access;
use App\Servers\SiteServer;
use Illuminate\Http\Request;

class SiteController extends ApiController
{
    public function __construct()
    {
//        $this->authorizeResource(Site::class, 'site');
    }

    /**
     * 获取站点列表
     * @param SiteServer $siteServer
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(SiteServer $siteServer): \Illuminate\Http\JsonResponse
    {
        $sites = auth()->user()->manageSites();
        return $this->success('', SiteResource::collection($sites));
    }

    public function store(SiteRequest $request, Site $site)
    {
        $site->name = $request->input('name');
        $site->description = $request->input('description');
        $site->save();

        $site->user()->attach(auth()->user(),['role'=>'admin']);

        $this->flashAccessTable($site);
        return $this->success('站点添加成功');
    }

    public function show(Site $site)
    {
        return $this->success('', new SiteResource($site));
    }

    public function update(SiteRequest $request, Site $site)
    {
        $site->fill($request->all())->save();
        $this->flashAccessTable($site);
        return $this->success('栏目修改成功', $site);
    }

    public function destroy(Site $site)
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
