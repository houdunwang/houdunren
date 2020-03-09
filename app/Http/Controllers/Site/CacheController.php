<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Models\Site;
use App\Services\AccessServer;

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
   * @param AccessServer $accessServer
   *
   * @return void
   */
  public function update(Site $site, AccessServer $accessServer)
  {
    $accessServer->updateSitePermission($site);
    return $this->success('站点缓存更新成功');
  }
}
