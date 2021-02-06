<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Edu\Api\ConfigController;
use Modules\Edu\Api\TagController;
use Modules\Edu\Api\LessonController;
use Modules\Edu\Api\SystemController;

Route::group(['prefix' => 'Edu/{site}'], function () {
    //配置
    Route::get('config', [ConfigController::class, 'show']);
    Route::put('config', [ConfigController::class, 'update']);
    //标签
    Route::get('tag', [TagController::class, 'index']);
    Route::put('tag', [TagController::class, 'update']);
    //课程
    Route::apiResource('lesson', LessonController::class);
    //系统课程
    Route::apiResource('system', SystemController::class);
});
