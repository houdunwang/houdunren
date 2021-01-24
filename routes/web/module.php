<?php

use App\Http\Controllers\Module\ConfigController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Module\EntryController;

//模块扩展
Route::group(['prefix' => 'module',  'as' => 'module.', 'middleware' => ['admin']], function () {
    //模块入口
    Route::get('entry', EntryController::class)->name('entry');
    Route::get('config', [ConfigController::class, 'edit'])->name('config.edit');
    Route::post('config', [ConfigController::class, 'store'])->name('config.store');
});
