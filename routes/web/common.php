<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\UploadController;
use App\Http\Controllers\Common\FavoriteController;
use App\Http\Controllers\Common\FavourController;
use App\Http\Controllers\Common\CodeController;
use App\Http\Controllers\Common\FollowerController;

//公共业务
Route::group(['prefix' => 'common', 'as' => 'common.'], function () {
    Route::post('upload/make', [UploadController::class, 'make'])->name('upload.make');
    Route::post('upload/local', [UploadController::class, 'local'])->name('upload.local');
    Route::post('upload/wangEditor', [UploadController::class, 'wangEditor'])->name('upload.wangEditor');;
    Route::post('upload/wangEditorMaterialNewsUpload/{wechat}', [UploadController::class, 'wangEditorMaterialNewsUpload'])->name('upload.wangEditorMaterialNews');
    Route::get('favorite/{model}/{id}/{module?}', [FavoriteController::class, 'make'])->name('favorite')->middleware('auth');
    Route::get('favour/{model}/{id}/{module?}', [FavourController::class, 'make'])->name('favour')->middleware('auth');
    Route::get('follower/{user}', [FollowerController::class, 'make'])->name('follower')->middleware('auth');
});
