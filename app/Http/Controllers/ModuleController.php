<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateModuleRequest;
use App\Models\Activity;
use App\Models\Module as ModelsModule;
use App\Models\Order;
use App\Services\ModuleService;
use Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->authorizeResource(ModelsModule::class);
    }

    public function index()
    {
        $modules = app(ModuleService::class)->all();
        return $modules;
    }

    public function show(ModelsModule $module)
    {
        $this->authorize('view', $module);
        return $this->respondWithSuccess($module);
    }

    //模块设计
    public function store(Request $request)
    {
        $this->authorize('create', ModelsModule::class);
        $name = $request->input('name');
        if (is_dir('Modules/' . $name)) {
            return $this->respondError('模块已经存在');
        }
        Artisan::call('module-create ' . $name);

        return $this->respondOk('模块创建成功');
    }

    public function update(UpdateModuleRequest $request, ModelsModule $module)
    {
        $this->authorize('update', $module);
        $module->fill($request->input())->save();
        return $this->respondOk('模块更新成功');
    }

    public function install(string $name, ModelsModule $module)
    {
        $this->authorize('install', $module);
        // DB::transaction(function () use ($name, $module) {
        $module->name = $name;
        $module->process = app(ModuleService::class)->config($module->name)['wechat']['process'] ?? false;
        $module->save();
        Artisan::call('module:migrate ' . $name . ' --force');
        // });

        return $this->respondOk('模块安装成功');
    }

    public function unInstall(ModelsModule $module)
    {
        $this->authorize('unInstall', $module);
        // DB::transaction(function () use ($module) {
        $module->delete();
        Activity::where('log_name', $module->name)->delete();
        Order::where('module', $module->name)->delete();
        // if (is_dir(module_path($module->name))) {
        Artisan::call('module:migrate-reset ' . $module->name . ' --force');
        // }
        // Storage::disk('module')->deleteDirectory($module->name);
        // });
        return $this->respondOk('模块卸载成功');
    }
}
