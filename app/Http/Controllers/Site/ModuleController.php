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

  public function siteAllModule(Site $site, ModuleServer $moduleServer)
  {
    $modules = $moduleServer->getSiteModule($site);
    return $this->success('站点所有模块', $modules);
  }

  /**
   * 当前用户使用的模块
   * @param Site $site
   * @param ModuleServer $moduleServer
   *
   * @return mixed
   */
  public function getByUser(Site $site, ModuleServer $moduleServer)
  {
    $modules = $moduleServer->getModuleByUser($site, auth()->user());
    return $this->success('当前用户可使用模块列表', $modules);
  }
}
