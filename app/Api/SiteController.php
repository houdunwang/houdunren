<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SiteService;

/**
 * 获取站点信息
 * @package App\Api\Common
 */
class SiteController extends Controller
{
    /**
     * 当前站点资料
     * @return void
     */
    public function self()
    {
        $site = SiteService::cache();
        unset($site['config']);
        return $site;
    }
}
