<?php

use Modules\Edu\Http\Controllers\OrderController;

//套餐定单支付
Route::get('Edu/Order/subscribe/{subscribe}', [OrderController::class, 'subscribe'])->middleware(['auth:sanctum', 'module']);

//首页
Route::any('Edu', function () {
    return view('edu::app');
})->where('path', '.*')->middleware(['module']);

Route::any('Edu/site/{site}/{path?}', function () {
    return view('edu::app');
})->where('path', '.*')->middleware(['module']);
