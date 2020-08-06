<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\ModuleConfig;
use App\Services\ConfigService;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function edit()
    {
        return view('module_config.edit');
    }

    public function store(Request $request, ConfigService $configService)
    {
        $configService->saveCurrentModuleConfig($request->input());

        return back()->with('success', '模块配置修改成功');
    }
}
