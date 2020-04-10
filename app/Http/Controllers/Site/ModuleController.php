<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Models\Site;
use App\Services\ModuleService;

class ModuleController extends ApiController
{
    public function __construct()
    {
        $this->middleware('site:admin,operator');
    }

    /**
     * 站点所有模块
     * @param Site $site
     * @param ModuleService $ModuleService
     *
     * @return void
     */
    public function site(Site $site, ModuleService $ModuleService)
    {
        $modules = $ModuleService->getSiteModule($site);
        return $this->json($modules);
    }

    /**
     * 当前用户使用的模块
     * @param Site $site
     * @param ModuleService $ModuleService
     *
     * @return mixed
     */
    public function user(Site $site, ModuleService $ModuleService)
    {
        $modules = $ModuleService->getModuleByUser($site, auth()->user());
        return $this->json($modules);
    }
}
