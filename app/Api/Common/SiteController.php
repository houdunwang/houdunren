<?php

namespace App\Api\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SiteService;
use ModuleService;

/**
 * 获取站点信息
 * @package App\Api\Common
 */
class SiteController extends Controller
{
    public function get()
    {
        $site = SiteService::site();
        $module = ModuleService::module();
        unset($site['config']);
        return ['site' => $site, 'module' => $module];
        // return [
        //     'title' => $site['title'],
        //     'user_id' => $site['user_id'],
        // ];
    }
}
