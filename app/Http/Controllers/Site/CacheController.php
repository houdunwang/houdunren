<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Models\Site;
use App\Services\AccessService;

/**
 * 站点缓存维护
 */
class CacheController extends ApiController
{
    public function __construct()
    {
        $this->middleware('site');
    }

    /**
     * 更新站点缓存
     * @param Site $site
     * @param AccessService $AccessService
     *
     * @return void
     */
    public function update(Site $site, AccessService $AccessService)
    {
        $AccessService->updateSitePermission($site);
        return $this->success('站点缓存更新成功');
    }
}
