<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\ConfigController;
use App\Http\Controllers\Module\MenuController;
use App\Http\Controllers\Site\AdminController;
use App\Http\Controllers\Site\ModuleController;
use App\Http\Controllers\Site\PermissionController;
use App\Http\Controllers\Site\RoleController;
use App\Http\Controllers\Site\SiteController;

//站点管理
Route::group(['prefix' => 'site', 'as' => 'site.', 'middleware' => ['site']], function () {
    Route::resource('site', SiteController::class);
});

//其他站点相关业务
Route::group(['prefix' => 'site/{site}', 'as' => 'site.', 'middleware' => ['site']], function () {
    //站点配置
    Route::get('config', [ConfigController::class, 'edit'])->name('config.edit');
    Route::put('config', [ConfigController::class, 'update'])->name('config.update');
    //角色管理
    Route::resource('role',  RoleController::class);
    //站点模块权限配置
    Route::get('permission/upgrade', [PermissionController::class, 'upgrade'])->name('permission.upgrade');
    Route::get('permission/{role}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('permission/{role}', [PermissionController::class, 'update'])->name('permission.update');
    //管理员设置
    Route::resource('admin', AdminController::class)->only(['index', 'store', 'destroy']);
    //搜索管理员
    Route::post('search/admin', [AdminController::class, 'search'])->name('admin.search');
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
