<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Servers\Access;
use Illuminate\Http\Request;

/**
 * 站点权限
 * Class AccessController
 * @package App\Http\Controllers\Site
 */
class AccessController extends ApiController
{
    /**
     * 刷新所有站点权限
     * @param Access $access
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(Access $access): \Illuminate\Http\JsonResponse
    {
        $access->updateAllSitePermission();
        return $this->success('权限更新成功');
    }
}
