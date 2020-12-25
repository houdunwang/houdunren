<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\ConfigController;
use App\Http\Controllers\Module\MenuController;
use App\Http\Controllers\Site\AdminController;
use App\Http\Controllers\Site\ModuleController;
use App\Http\Controllers\Site\PermissionController;
use App\Http\Controllers\Site\RoleController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\SiteController;

//站点管理
Route::group(['prefix' => 'site', 'as' => 'site.', 'middleware' => ['auth', 'site']], function () {
    Route::resource('site', SiteController::class)->middleware(['auth', 'site']);
});

//其他站点相关业务
Route::group(['prefix' => 'site/{site}', 'as' => 'site.', 'middleware' => ['auth', 'site']], function () {
    Route::get('config', [ConfigController::class, 'edit'])->name('config.edit');
    Route::put('config', [ConfigController::class, 'update'])->name('config.update');
    Route::resource('role',  RoleController::class);
    Route::get('permission/{role}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('permission/{role}', [PermissionController::class, 'update'])->name('permission.update');
    Route::resource('admin',  AdminController::class)->only(['index', 'destroy']);
    Route::get('admin/store/{admin}', [AdminController::class, 'store'])->name('admin.store');
    Route::post('search/admin', [SearchController::class, 'admin'])->name('search.admin');
    Route::get('admin/role/{user}', [AdminController::class, 'role'])->name('admin.role');
    Route::put('admin/role/{user}', [AdminController::class, 'updateRole'])->name('admin.role.update');
    //站点模块列表
    Route::get('module', [ModuleController::class, 'index'])->name('module.index');
    Route::get('module/admin/{module}', [ModuleController::class, 'admin'])->name('module.admin');
    //站点通用菜单供前台模块使用
    Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('menu/get', [MenuController::class, 'get'])->name('menu.get');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
});
