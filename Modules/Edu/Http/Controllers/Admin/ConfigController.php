<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use ConfigService;

/**
 * 模块配置
 * @package Modules\Edu\Http\Controllers\Admin
 */
class ConfigController extends Controller
{
    public function edit()
    {
        $config = config('module', 'a');
        return inertia('Admin/Config/Form', compact('config'));
    }


    /**
     * 保存配置
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        ConfigService::saveModuleConfig($request->input());
        return back()->with('success', '配置文件修改成功');
    }
}
