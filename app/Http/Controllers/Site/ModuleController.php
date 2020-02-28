<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Models\Site;
use App\Servers\ModuleServer;

class ModuleController extends ApiController
{
    public function __construct()
    {
        $this->middleware('siteAuth:admin,operator');
    }

    /**
     * 获取站点模块
     * @param Site $site
     * @param ModuleServer $moduleServer
     *
     * @return mixed
     */
    public function index(Site $site, ModuleServer $moduleServer)
    {
        $modules = $moduleServer->getModuleByUser($site, auth()->user());
        return $this->success('站点模块列表', $modules);
    }
}
