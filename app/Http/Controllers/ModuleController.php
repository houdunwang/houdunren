<?php

namespace App\Http\Controllers;

use App\Console\Commands\ModuleModel;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Models\Activity;
use App\Models\Module as ModelsModule;
use App\Services\ModuleService;
use Artisan;
use Illuminate\Http\Request;
use Nwidart\Modules\Facades\Module;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
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

    public function update(UpdateModuleRequest $request, ModelsModule $module)
    {
        $this->authorize('update', $module);
        $module->fill($request->input())->save();
        return $this->respondOk('模块更新成功');
    }

    public function install(string $name, ModelsModule $module)
    {
        $module->name = $name;
        $module->save();
        Artisan::call('module:migrate ' . $name);

        return $this->respondOk('模块安装成功');
    }

    public function unInstall(ModelsModule $module)
    {
        $module->delete();
        Artisan::call('module:migrate-reset ' . $module->name);
        Activity::where('log_name', $module->name)->delete();

        return $this->respondOk('模块卸载成功');
    }
}
