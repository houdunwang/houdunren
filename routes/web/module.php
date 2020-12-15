<?php

use App\Http\Controllers\Module\ConfigController;
use App\Http\Controllers\Module\MenuController;
use Illuminate\Support\Facades\Route;

//模块扩展
Route::group(['prefix' => 'module',  'as' => 'module.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('config', [ConfigController::class, 'edit'])->name('config.edit');
    Route::post('config', [ConfigController::class, 'store'])->name('config.store');
    Route::get('menu/{path}', [MenuController::class, 'show'])->name('menu.show');
});
