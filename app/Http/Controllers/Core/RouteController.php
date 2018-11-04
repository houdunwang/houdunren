<?php

namespace App\Http\Controllers\Core;

use App\Models\Module;
use App\Http\Controllers\Controller;

/**
 * 访问路由处理
 * Class RouteController
 * @package App\Http\Controllers\Admin
 */
class RouteController extends Controller
{
    public function make(Module $module)
    {
        return \App::call($module->getEntranceByDomain());
    }
}
