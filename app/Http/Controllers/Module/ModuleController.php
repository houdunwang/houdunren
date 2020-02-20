<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\ApiController;
use App\Models\Site;
use App\Servers\ModuleServer;

class ModuleController extends ApiController
{
  public function index(Site $site, ModuleServer $moduleServer)
  {
    $modules = $moduleServer->getSiteModule(\site(null));
    return $this->success('模块列表获取成功', $modules);
  }
}
