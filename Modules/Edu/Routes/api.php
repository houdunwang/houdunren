<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Edu\Api\ConfigController;
use Modules\Edu\Api\TagController;
use Modules\Edu\Api\LessonController;
use Modules\Edu\Api\SystemController;
use Modules\Edu\Api\SubscribeController;
use Modules\Edu\Api\TopicController;
use Modules\Edu\Api\VideoController;
use Modules\Edu\Api\SignController;

Route::group(['prefix' => 'Edu'], function () {
    //配置
    Route::get('config', [ConfigController::class, 'show']);
    Route::put('config', [ConfigController::class, 'update']);
    //标签
    Route::get('tag', [TagController::class, 'index']);
    Route::put('tag', [TagController::class, 'update']);
    //课程
    Route::get('lesson/search', [LessonController::class, 'search']);
    Route::apiResource('lesson', LessonController::class);
    //系统课程
    Route::apiResource('system', SystemController::class);
    //套餐
    Route::apiResource('subscribe', SubscribeController::class);
    //贴子
    Route::apiResource('topic', TopicController::class);
    //视频
    Route::apiResource('video', VideoController::class);
    //签到
    Route::apiResource('sign', SignController::class);
});

// Route::group(['prefix' => 'Edu', 'middleware' => ['front']], function () {
//     //课程
//     Route::get('lesson/search', [LessonController::class, 'search']);
//     Route::apiResource('lesson', LessonController::class);
// });
