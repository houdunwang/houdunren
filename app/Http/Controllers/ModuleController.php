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
    public function index()
    {
        $modules = app(ModuleService::class)->all();
        return $modules;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModuleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModuleRequest $request, Module $module)
    {
        //
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
