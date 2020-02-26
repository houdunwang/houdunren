<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Servers\Access;
use App\Servers\AccessServer;

/**
 * 更新缓存
 * Class CacheController
 * @package App\Http\Controllers\System
 */
class CacheController extends ApiController
{
  public function __construct()
  {
    $this->middleware('systemAuth');
  }

  /**
   * 更新缓存
   * @param Access $access
   * 
   * @return mixed
   */
  public function update(AccessServer $accessServer)
  {
    //更新站点权限
    $accessServer->updateAllSitePermission();
    return $this->success('缓存更新成功');
  }
}
