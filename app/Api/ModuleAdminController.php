<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Auth;
use ModuleService;

/**
 * 模块管理
 * @package App\Api
 */
class ModuleAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'admin']);
    }

    public function module()
    {
        return module();
    }

    public function modules()
    {
        return ModuleService::userSiteModules(site(), Auth::user());
    }
}
