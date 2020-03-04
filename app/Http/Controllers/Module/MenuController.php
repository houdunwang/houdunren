<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\ApiController;
use App\Models\Module;
use App\Models\Site;
use App\Servers\MenuServer;

/**
 * 模块菜单
 * Class MenuController
 */
class MenuController extends ApiController
{
  public function index(Site $site, Module $module, MenuServer $menuServer)
  {
    $menus = $menuServer->getByUser($site, $module, auth()->user());
    return $this->success('用户菜单', $menus);
  }
}
