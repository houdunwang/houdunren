<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModuleConfigRequest;
use App\Http\Requests\UpdateModuleConfigRequest;
use App\Models\ModuleConfig;
use App\Services\ModuleService;
use Illuminate\Support\Facades\Request;

class ModuleConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['common']);
    }

    //所有配置项
    public function all(string $name)
    {
        return app(ModuleService::class)->config($name);
    }

    //公共开放配置项
    public function common(string $name)
    {
        $config = app(ModuleService::class)->config($name);
        if (isset($config['private'])) unset($config['private']);

        return $config;
    }

    //更新配置项
    public function update(Request $request, string $name)
    {
        $this->authorize('update', ModuleConfig::class);
        ModuleConfig::updateOrCreate(['module' => $name], ['data' => request()->input()]);
        return $this->respondOk('配置项保存成功');
    }
}
