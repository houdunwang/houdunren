<?php

use Illuminate\Http\Request;
use Modules\Article\Api\ModelController;
use Modules\Article\Api\TagController;
use Modules\Article\Api\ContentController;
use Modules\Article\Api\CategoryController;
use Modules\Article\Api\SwiperController;
use Modules\Article\Api\TemplateController;
use Modules\Article\Api\MenuController;

Route::group(['prefix' => 'Article/{site}', 'middleware' => ['module']], function () {
    //模型
    Route::apiResource('model', ModelController::class);
    //标签
    Route::apiResource('tag', TagController::class);
    //文章
    Route::apiResource('content', ContentController::class);
    //栏目
    Route::apiResource('category', CategoryController::class);
    //幻灯片
    Route::apiResource('swiper', SwiperController::class);
    //模板
    Route::apiResource('template', TemplateController::class);
    //菜单
    Route::get('menu', [MenuController::class, 'index']);
    Route::put('menu', [MenuController::class, 'update']);
    Route::delete('menu/{menu}', [MenuController::class, 'destroy']);
});
