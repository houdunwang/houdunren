<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use App\Servers\Access;

class SiteController extends ApiController
{
    public function __construct()
    {
        $this->authorizeResource(Site::class, 'site');
    }

    public function index()
    {
        return $this->success('', SiteResource::collection(Site::all()));
    }

    public function store(SiteRequest $request, Site $site)
    {
        $site->name = $request->name;
        $site->description = $request->description;
        $site->save();
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
