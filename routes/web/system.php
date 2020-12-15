<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\System\HomeController;
use App\Http\Controllers\System\ModuleController;
use App\Http\Controllers\System\TemplateController;
use App\Http\Controllers\System\ConfigController;
use App\Http\Controllers\System\PackageController;
use App\Http\Controllers\System\GroupController;
use App\Http\Controllers\System\MyController;
//系统核心功能
Route::group(['prefix' => 'system', 'middleware' => ['auth', 'system'], 'as' => 'system.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('module', [ModuleController::class, 'index'])->name('module.index');
    Route::get('module/install/{name}', [ModuleController::class, 'install'])->name('module.install');
    Route::delete('module/uninstall/{module:name}', [ModuleController::class, 'uninstall'])->name('module.uninstall');
    Route::get('module/installed', [ModuleController::class, 'installed'])->name('module.installed');
    Route::get('template', [TemplateController::class, 'index'])->name('template.index');
    Route::get('template/install/{name}', [TemplateController::class, 'install'])->name('template.install');
    Route::delete('template/uninstall/{template:name}', [TemplateController::class, 'uninstall'])->name('template.uninstall');
    Route::get('template/installed', [TemplateController::class, 'installed'])->name('template.installed');
    Route::resource('package',  PackageController::class)->except(['show']);
    Route::resource('group',  GroupController::class);
    //修改个人资料
    Route::get('my/edit', [MyController::class, 'edit'])->name('my.edit');
    Route::put('my/update', [MyController::class, 'update'])->name('my.update');
    //系统配置修改
    Route::get('config/edit', [ConfigController::class, 'edit'])->name('config.edit');
    Route::put('config/edit', [ConfigController::class, 'update'])->name('config.update');
    Route::any('config/upload', [ConfigController::class, 'upload'])->name('config.upload');
});
