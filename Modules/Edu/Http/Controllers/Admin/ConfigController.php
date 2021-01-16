<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

/**
 * 模块配置
 * @package Modules\Edu\Http\Controllers\Admin
 */
class ConfigController extends Controller
{
    public function edit()
    {
        return inertia('Admin/Config/Form');
    }

    public function update(Request $request)
    {
    }
}
